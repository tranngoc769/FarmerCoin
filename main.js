var TEMPLATES = null;
const interval_price = 60 * 1000;
let get_currency = (element) => {
    try {
        return $(`#${element}_price`).text() * 1.0;
    } catch (error) {
        return 0;;
    }
}
let get_account_info = (name) => {
    var formData = {
        "account_name": name
    };
    return $.ajax({
        type: "POST",
        url: "https://chain.wax.io/v1/chain/get_account",
        data: JSON.stringify(formData),
        dataType: "json",
        contentType: "application/json;charset=UTF-8",
        encode: true
    }).fail((result, status, error) => {
        console.warn("get_account_info: ", result);
    });
};
let get_rows = (table, name, index_position) => {
    var formData = {
        "json": true,
        "code": "farmersworld",
        "scope": "farmersworld",
        "table": table,
        "table_key": "",
        "lower_bound": name,
        "upper_bound": name,
        "index_position": index_position,
        "key_type": "i64",
        "limit": 100,
        "reverse": false,
        "show_payer": false
    };
    return $.ajax({
        type: "POST",
        url: "https://api.wax.alohaeos.com/v1/chain/get_table_rows",
        data: JSON.stringify(formData),
        dataType: "json",
        contentType: "application/json;charset=UTF-8",
        encode: true
    }).fail((result, status, error) => {
        console.warn("get_rows: ", result);
    });
};
let get_account_balance = (name) => {
    return $.ajax({
        type: "GET",
        url: "https://lightapi.eosamsterdam.net/api/balances/wax/" + name,
        dataType: "json",
        contentType: "text/plain;charset=UTF-8",
        encode: true
    }).fail((result, status, error) => {
        console.warn("get_account_balance: ", result);
    });
};
let create_block = (name) => {
    let html = `
            <div class="col-xl-4 col-lg-5 col-md-5">
            <div class="card profile_card  new_card">
                <div class="card-header">
                    <div class="media-body">
                        <p style="margin-bottom: 0px;">Account name <span class="badge danger-3 md">bugg4.wam<span name=""></span></p>
                        </br>
                        <span class="badge darken-3 md">Balance:<span name="${name}_balance"></span></span>
                        <span class="badge darken-3 md">Staking:<span name="${name}_staking">0</span></span>
                        <p class="mb-0" name="${name}_cpu">CPU : 0%</p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="media">
                        <div class="media-body" task="account">
                            <div class="row">
                                <div class="col-6 ntf ">ACCOUNT</div>
                                <div class="col-6 ntf">Energy: <span name="${name}_energy" class="badge bg-danger p-2" style="padding: 5px !important;">20/300</span></div>
                            </div>
                            <div class="row">
                                <div class="col-3 ntf">Token:</div>
                                <div class="col-6 ntf center">Ingame:</div>
                                <div class="col-3 ntf right">Daily:</div>
                            </div>
                            <div class="row">
                                <div class="col-3 ntf">0</div>
                                <div class="col-6 ntf center">
                                    <p class="mb-1" name="${name}_acc_f"><span ><i class="fa fa-phone me-2 text-primary"></i></span>0</p>
                                </div>
                                <div class="col-3 ntf right" name="${name}_acc_f_cost">0 ￦</div>
                            </div>
                            <div class="row">
                                <div class="col-3 ntf">0</div>
                                <div class="col-6 ntf center">
                                    <p class="mb-1"  name="${name}_acc_w"><span ><i class="fa fa-phone me-2 text-primary"></i></span>0</p>
                                </div>
                                <div class="col-3 ntf right" name="${name}_acc_w_cost">0 ￦</div>
                            </div>
                            <div class="row">
                                <div class="col-3 ntf">0</div>
                                <div class="col-6 ntf center">
                                    <p class="mb-1" name="${name}_acc_g"><span ><i class="fa fa-phone me-2 text-primary"></i></span>0</p>
                                </div>
                                <div class="col-3 ntf right" name="${name}_acc_g_cost">0 ￦</div>
                            </div>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-body">
                            <div class="row">
                                <div class="col-6 ntf ">MINING</div>
                                <div class="col-6 ntf">Daily Profit: <span class="badge bg-danger p-2" style="padding: 5px !important;">1118 W</span></div>
                            </div>
                            <div id="${name}_acc_mining">
                            
                            </div>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-body" task="mining">
                            <div class="row">
                                <div class="col-6 ntf ">Raising COW</div>
                                <div class="col-6 ntf">Daily Cost: <span class="badge bg-danger p-2" style="padding: 5px !important;">1118 W</span></div>
                            </div>
                            <div class="row">
                                <div class="col-6 ntf">
                                    <p>Cow<span>(0/6) 01:01:01</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-body" task="mining">
                            <div class="row">
                                <div class="col-6 ntf ">CROPS</div>
                                <div class="col-6 ntf">Daily Cost: <span class="badge bg-danger p-2" style="padding: 5px !important;">1118 W</span></div>
                            </div>
                            <div class="row">
                                <div class="col-6 ntf">
                                    <p>Cow<span>(0/6) 01:01:01</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;
    return html;
}
let create_account_blocks = function(name) {
    if (TEMPLATES != null) {
        $("#row_acc").empty();
        let html = create_block(name);
        $("#row_acc").append(html);
        get_account_info(name).done((acc_data) => {
            let cpu = parseInt((acc_data.cpu_limit.used / acc_data.cpu_limit.max) * 100)
            get_account_balance(name).done((acc_balance) => {
                acc_balance.balances.forEach(element => {
                    if (element.currency == "WAX") {
                        let balance = (element.amount * 1.0).toFixed(2);
                        console.log("CPU:", cpu)
                        console.log("WAX", balance);
                        // Get accounts: accounts, name, 1
                    }
                });
            });
            // Energy
            get_rows("accounts", name, 1).done((rows_data) => {
                let account_info_obj = {
                    "FOOD": {
                        "value": 0
                    },
                    "WOOD": {
                        "value": 0
                    },
                    "GOLD": {
                        "value": 0
                    },
                }
                let energy = 0;
                let max_energy = 0;
                rows_data.rows.forEach(element => {
                    let bals = element.balances;
                    bals.forEach(bal => {
                        if (bal.includes("FOOD")) {
                            account_info_obj["FOOD"] = bal;
                        }
                        if (bal.includes("WOOD")) {
                            account_info_obj["WOOD"] = bal;
                        }
                        if (bal.includes("GOLD")) {
                            account_info_obj["GOLD"] = bal;
                        }
                    });
                    energy = element.energy;
                    max_energy = element.max_energy;
                    $(`span[name='${name}_energy']`)[0].textContent = `${energy}/${max_energy}`;
                    $(`p[name='${name}_acc_f']`)[0].innerHTML = `<span ><i class="fa fa-phone me-2 text-primary"></i></span>${account_info_obj["FOOD"]}`;
                    $(`p[name='${name}_acc_w']`)[0].innerHTML = `<span ><i class="fa fa-phone me-2 text-primary"></i></span>${account_info_obj["WOOD"]}`;
                    $(`p[name='${name}_acc_g']`)[0].innerHTML = `<span ><i class="fa fa-phone me-2 text-primary"></i></span>${account_info_obj["GOLD"]}`;
                });
            });
            // Start mining
            $(`div[id='${name}_acc_mining']`).empty();
            get_rows("tools", name, 2).done((rows_data) => {
                rows_data.rows.forEach(element => {
                    let time_now = Math.round(new Date().getTime() / 1000);
                    let temp_id = element.template_id;
                    let item = TEMPLATES[temp_id];
                    let item_name = item.name;
                    let next_time = new Date((element.next_availability - time_now) * 1000).toISOString().substr(11, 8);
                    let current_durability = element.current_durability;
                    let durability = element.durability;
                    let html = `
                    <div class="row" >
                        <div class="col-4 ntf">${item_name}</div>
                        <div class="col-3 ntf">${next_time}</div>
                        <div class="col-3 ntf right">${current_durability} / ${durability}</div>
                        <div class="col-2 ntf right">0 ￦</div>
                    </div>
                    `;
                    $(`div[id='${name}_acc_mining']`).append(html)
                });
            });
            get_rows("mbs", name, 2).done((rows_data) => {
                rows_data.rows.forEach(element => {
                    let time_now = Math.round(new Date().getTime() / 1000);
                    let temp_id = element.template_id;
                    let item = TEMPLATES[temp_id];
                    let item_name = item.name;
                    let farmer_coin = item.mine_farmer_coin;
                    var e_type = element.type;
                    let next_time = new Date((element.next_availability - time_now) * 1000).toISOString().substr(11, 8);
                    // check min
                    // let percent = item.mine_fwf + mine_fwg + mine_fww;
                    let percent = (1 / 24);
                    let min_type = Infinity;
                    for (let [key, value] of Object.entries(TEMPLATES)) {
                        let tem_item = value;
                        let tmp = e_type;
                        if (tem_item.t_type != null && tem_item.t_type.toLowerCase() == tmp.toLowerCase()) {
                            let sum_min = 1 * tem_item.mine_fwf + 1 * tem_item.mine_fww + 1 * tem_item.mine_fwg;
                            if (sum_min < min_type && sum_min != 0) {
                                min_type = sum_min;
                            }
                        }
                    }
                    let increase = parseInt(min_type / percent)
                        // 
                    let html = `
                    <div class="row" >
                        <div class="col-4 ntf">${item_name}</div>
                        <div class="col-3 ntf">${next_time}</div>
                        <div class="col-3 ntf right">${farmer_coin} / ${increase}</div>
                        <div class="col-2 ntf right">0 ￦</div>
                    </div>
                    `;
                    $(`div[id='${name}_acc_mining']`).append(html)
                });
            });

        });
    }
}
let get_price = function() {
    var settings = {
        "url": "/index.php/myapi/api_ntf_price",
        "method": "GET",
        "timeout": 0,
    };
    $.ajax(settings).done(function(response) {
        try {
            response = JSON.parse(response);
        } catch (e) {}
        let tmp = ["FWF", "FWW", "FWG", "USD"];
        tmp.forEach(element => {
            let price = response[element].last_price;
            let percent = response[element].change24
            try {
                $(`span[task='${element}_price']`).text(price.toFixed(2));
                $(`span[task='${element}_price_percent']`).text(percent.toFixed(2) + " %");
                $(`#${element}_price_value`).val(price);
            } catch (e) {}
        });
    }).fail(function(response) {
        alert("Error");
        console.log(response);
    });
}
let get_template_config = () => {
    return $.ajax({
        type: "GET",
        url: "/index.php/myapi/api_template_with_dm",
        dataType: "json",
        contentType: "application/json;charset=UTF-8",
        encode: true
    }).fail((result, status, error) => {
        console.warn("get_account_info: ", result);
    });
};
get_price();
let get_template_price_by_tool = (group) => {
    return $.ajax({
        type: "GET",
        url: "/index.php/myapi/api_template_group?type=" + group,
        dataType: "json",
        contentType: "application/json;charset=UTF-8",
        encode: true
    }).fail((result, status, error) => {
        console.warn("get_template_price_by_tool: ", result);
    });
};
setInterval(get_price, interval_price);
let create_tool_blocks = function(group, obj) {
    let price = obj.price;
    let buy_ah = price.amount / (10 * price.token_precision);
    let sell_ah = buy_ah * 0.9;
    let html = `
    <div class="media">
               <img src="/style/img/2.9268586d.png" width="60" height="60" alt="" class="me-3 rounded-circle me-0 me-sm-3">
               <div class="media-body">
                  <div class="row">
                     <div class="col-6 ntf">Daily</div>
                     <div class="col-6 ntf right">379 ￦</div>
                  </div>
                  <div class="row">
                     <div class="col-6 ntf">ROI</div>
                     <div class="col-6 ntf right">379 ￦</div>
                  </div>
                  <div class="row">
                     <div class="col-4">
                           <div class="col">
                              <div class="row">
                                 <div class="col-6 ntf">Buy AH</div>
                                 <div class="col-6 ntf">${parseInt(buy_ah)} ￦</div>
                              </div>
                              <div class="row">
                                 <div class="col-6 ntf">Sell AH</div>
                                 <div class="col-6 ntf">${parseInt(buy_ah)} ￦</div>
                              </div>
                           </div>
                     </div>
                     <div class="col-4">
                           <div class="col">
                              <div class="row">
                                 <div class="col-6 ntf">Buy DC</div>
                                 <div class="col-6 ntf">18 ￦</div>
                              </div>
                              <div class="row">
                                 <div class="col-6 ntf">Sell DC</div>
                                 <div class="col-6 ntf">18 ￦</div>
                              </div>
                           </div>
                     </div>
                     <div class="col-4">
                           <div class="col">
                              <div class="row">
                                 <div class="col-6 ntf">BC</div>
                                 <div class="col-6 ntf">18 ￦</div>
                              </div>
                              <div class="row">
                                 <div class="col-6 ntf">SC</div>
                                 <div class="col-6 ntf">18 ￦</div>
                              </div>
                           </div>
                     </div>
                  </div>
               </div>
            </div>
        `;
    $(`#${group}_templates`).append(html);
}
let create_tools_block = function() {
    get_template_price_by_tool("TOOL").done(function(response) {
        if (response.code != 200) {
            alert("Error");
            return;
        }
        for (let [group, data] of Object.entries(response.data)) {
            $(`#${group}_templates`).empty();
            data.forEach(element => {
                console.log(element);
                create_tool_blocks(group, element)
            });
        }
    })
}
$(document).ready(function() {
    create_tools_block();
    get_template_config().done(function(response) {
        TEMPLATES = response;
        create_account_blocks("bugg4.wam")
    })
});