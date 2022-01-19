<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class MyAPI extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('template_model');
        $this->load->model('history_model');
        $this->ntf_url = "https://wax.api.atomicassets.io/atomicmarket";
        $this->fprice_url = "https://wax.alcor.exchange/api/markets";
        $this->usd_vnd_url = 'https://p2p.binance.com/bapi/c2c/v2/friendly/c2c/adv/search';
        $this->wax_price_url = 'https://api.huobi.pro/market/detail?symbol=waxpusdt';
    }

    public function get_account()
    {
        $curl = curl_init();
        
        $payload = json_encode( array( "account_name"=> "bugg4.wam" ) );
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://chain.wax.io/v1/chain/get_account',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>$payload,
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'User-Agent: PostmanRuntime/7.28.4',
            'Host: chain.wax.io',
        ),
        ));
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Cookie: AWSELB=C17BB181189BA932E9703059DB2661260667E9BEB5B0BFB647008F9BBC5ABAE1CB5BBA416DFBA95F15FEDB4A5AA75C8766BB520B59D650B411AF154F6766496B1EF8B52545; AWSELBCORS=C17BB181189BA932E9703059DB2661260667E9BEB5B0BFB647008F9BBC5ABAE1CB5BBA416DFBA95F15FEDB4A5AA75C8766BB520B59D650B411AF154F6766496B1EF8B52545"));
        curl_setopt( $curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }
    public function usd_vnd()
    {

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->usd_vnd_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{"page":1,"rows":10,"payTypes":[],"asset":"USDT","tradeType":"SELL","fiat":"VND","publisherType":null,"merchantCheck":false}',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Cookie: cid=ciALybNH'
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $resp = json_decode($response);
        $data = $resp->data;
        if ($data == null) {
            $response = array("code" => 403, "msg" => "data is null");
            echo json_encode($response, JSON_UNESCAPED_UNICODE);
            return;
        }
        $price = 1000000;
        for ($i = 0; $i < count($data); $i++) {
            $item = $data[$i];
            $adv = $item->adv;
            if ($adv != null) {
                $p = $adv->price;
                if ($p < $price) {
                    $price = $p;
                }
            }
        }
        $response = array("code" => 200, "price" => $price);
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        return;
    }
    public function api_template_group()
    {
        $temple_type = $_GET["type"];
        if (!isset($temple_type)){
            $response = array("code" => 403, "msg" => "data is null");
            echo json_encode($response, JSON_UNESCAPED_UNICODE);
            return;
        }
        $resp = array();
        $resp["food"] = array();
        $resp["wood"] = array();
        $resp["gold"] = array();
        $templates = $this->template_model->get_all_template_by_type($temple_type);
        for ($i = 0; $i < count($templates); $i++) {
            # code...
            $tmp = $templates[$i];
            $template_id = $tmp->id;
            $curl = curl_init();
            $insert_med = [298612,298593,318607,318606,298596,298595,298592]; 
            $c_url = $this->ntf_url . "/v1/sales/templates?symbol=WAX&template_id=" . $template_id . "&page=1&limit=1&sort=price";
            if (in_array($template_id,$insert_med)){
                $c_url = "https://wax.api.atomicassets.io/atomicmarket/v1/prices/templates?template_id=" . $template_id . "&page=1&limit=1&order=asc";
               }
            curl_setopt_array($curl, array(
                CURLOPT_URL => $c_url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'Cookie: __cflb=04dToT3YbvfoHPc3Qwr6tomF4pviam7v3kPQgTbAbM'
                ),
            ));
            $response = curl_exec($curl);
            $data = json_decode($response);
            if ($data->success == true){
                $list_data = $data->data;
                $price = array_pop($list_data);
                array_push($resp[$tmp->t_type],$price);
            }
            curl_close($curl);
        }
        $response = array("code" => 200, "data" => $resp);
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        return;
    }
    public function api_ntf_price()
    {
        $curl = curl_init();
        $c_url = $this->fprice_url;
        curl_setopt_array($curl, array(
            CURLOPT_URL => $c_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Cookie: __cflb=04dToT3YbvfoHPc3Qwr6tomF4pviam7v3kPQgTbAbM'
            ),
        ));

        $response = curl_exec($curl);
        $data = json_decode($response);
        curl_close($curl);
        $type_ntf = array("fwf", "fwg", "fww");
        $response_data = array();
        for ($i = 0; $i < count($data); $i++) {
            $item = $data[$i];
            $quote_token = $item->quote_token;
            if ($quote_token != null) {
                $symbol = $quote_token->symbol;
                if ($symbol != null) {
                    $name = $symbol->name;
                    if (in_array(strtolower($name), $type_ntf)) {
                        $tmp = array("last_price" => $item->last_price, "volume24" => $item->volume24, "change24" => $item->change24);
                        $response_data[$name] = $tmp;
                    }
                }
            }
        }
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->usd_vnd_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{"page":1,"rows":10,"payTypes":[],"asset":"USDT","tradeType":"SELL","fiat":"VND","publisherType":null,"merchantCheck":false}',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Cookie: cid=ciALybNH'
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $resp = json_decode($response);
        $data = $resp->data;
        if ($data == null) {
            $response = array("code" => 403, "msg" => "data is null");
            echo json_encode($response, JSON_UNESCAPED_UNICODE);
            return;
        }
        $price = 1000000;
        for ($i = 0; $i < count($data); $i++) {
            $item = $data[$i];
            $adv = $item->adv;
            if ($adv != null) {
                $p = $adv->price;
                if ($p < $price) {
                    $price = $p;
                }
            }
        }
        $response_data["USD"] = array("change24"=>0,"last_price"=>$price*1,"volume24"=>0);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->wax_price_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Cookie: __cflb=04dToT3YbvfoHPc3Qwr6tomF4pviam7v3kPQgTbAbM'
            ),
        ));

        $response = curl_exec($curl);
        $data = json_decode($response);
        $close = $data->tick->close;
        $response_data["WAX"] = array("change24"=>0,"last_price"=>$close*1,"volume24"=>0);
        curl_close($curl);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL =>  "https://wax.api.atomicassets.io/atomicmarket/v1/prices/templates?template_id=260676&page=1&limit=1&order=asc",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Cookie: __cflb=04dToT3YbvfoHPc3Qwr6tomF4pviam7v3kPQgTbAbM'
            ),
        ));

        $response = curl_exec($curl);
        $data = json_decode($response);
        curl_close($curl);
        $farm_coin = 0;
        try {
            $prec = $data->data[0]->token_precision;
            $suggested_median = $data->data[0]->suggested_median;
            $farm_coin = $suggested_median/(100000000);
        } catch (\Throwable $th) {
            //throw $th;
        }
        $response_data["FARM"] = array("change24"=>0,"last_price"=>$farm_coin*1,"volume24"=>0);
        echo json_encode($response_data, JSON_UNESCAPED_UNICODE);
    }
    public function api_template_with_dm(){
        
        $templates = $this->template_model->get_all_template_with_dm();
        $response_data = array();
        for ($i=0; $i < count($templates); $i++) { 
            # code...
            $item = $templates[$i];
            $id = $item->id;
            $response_data[$id] = $item;
        }
        echo json_encode($response_data, JSON_UNESCAPED_UNICODE);
    }
    public function save_form(){
        echo("ok");
    }
}
