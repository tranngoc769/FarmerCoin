function format_num(number) {
    return (parseInt(number) + "").replace(/\d(?=(\d{3})+\.)/g, '$&,');
}

function get_val(ss) {
    return ss.replace("￦", "").replace("đ", "").replace("$", "") * 1
}
var Sum_staked = 0;
var Sum_withdraw = 0;
var interval_price = 60 * 1000;
var interval_accs = 60 * 1000;
var interval_tools = 300 * 1000;
var interval_report = 30 * 1000;
var WAX_Price = 0;
var GiaUSDT = 0;
var USDT_Price = 1;
var VND_Price = 1;
var useUSD = 1;
var CurrentUsed = "￦"
var MaxSell = {

}
var SwitchWD = {
    "F": true,
    "W": true,
    "G": true
}
var AccAnimals = {
    "318606": 0
}

function get_report() {
    Sum_withdraw = 0;
    let wds = $(`i[name*='_withdraw']`);
    for (let index = 0; index < wds.length; index++) {
        const element = wds[index];
        let val = element.innerText;
        Sum_withdraw += val * 1 * GiaUSDT * WAX_Price;
    }
    $("#report_withdraw").val(format_num(Sum_withdraw));
    // Staked

    Sum_staked = 0;
    let sds = $(`i[name*='_staking']`);
    for (let index = 0; index < sds.length; index++) {
        const element = sds[index];
        let val = element.innerText;
        Sum_staked += val * 1 * GiaUSDT * WAX_Price;;
    }
    $("#report_staked").val(format_num(Sum_staked));
    // GET NAP
    $.ajax({
        type: "GET",
        url: "/index.php/myapi/get_nap",
        dataType: "json",
        contentType: "text/plain;charset=UTF-8",
        encode: true
    }).fail((result, status, error) => {
        alert("Failed get nap")
    }).done((result, status, error) => {
        console.log(result)
        try {
            result = JSON.parse(result);
        } catch (error) {

        }
        if (result.code != 200) {
            alert(result.msg);
        } else {
            $("#report_nap").val(format_num(result.msg));
        }
    });
    // GET RUT
    $.ajax({
        type: "GET",
        url: "/index.php/myapi/get_rut",
        dataType: "json",
        contentType: "text/plain;charset=UTF-8",
        encode: true
    }).fail((result, status, error) => {
        alert("Failed get nap")
    }).done((result, status, error) => {
        console.log(result)
        try {
            result = JSON.parse(result);
        } catch (error) {

        }
        if (result.code != 200) {
            alert(result.msg);
        } else {
            let rut = result.msg;
            $("#report_rut").val(rut);
            let profits = rut - Sum_withdraw;
            $("#report_profits").val(format_num(profits));
            $("#report_all").val(format_num((Sum_staked + rut + Sum_withdraw)));
        }
    });

}

function update_gear(name, price) {
    try {
        let curr = $(`i[name='${name}_gear']`).text();
        if (curr * 0 == 0) {
            if (price == undefined || price * 0 != 0) {
                price = 0;
            }
            $(`i[name='${name}_gear']`).text((curr * 1 + price).toFixed(2))
        }
    } catch (error) {

    }
}

function chuanhoa(ss) {
    return ss.replace("FOOD", "").replace("WOOD", "").replace("GOLD", "").replace(" ", "")
}
var ListAcc = []
var MomCow = 0;
var MinBaley = 0;
var MinCaft = 0;
var MinCorn = 0;
// Inteval;
var IntervalPrice = null
var IntervalAcc = null
var IntervalTools = null
var IntervalReports = null

function get_cost_mine(template) {
    return {
        "wood": template.mine_fww,
        "gold": template.mine_fwg - template.cost_fwg,
        "food": template.mine_fwf - template.cost_fwf,
        "c": template.mine_farmer_coin
    }
}

function get_min_buy(arr) {
    let min = Infinity;
    arr.forEach(element => {
        if (element < min && element != 0) {
            min = element
        }
    });
    return min
}

function get_max_sell(arr) {
    let min = 0;
    arr.forEach(element => {
        if (element > min) {
            min = element
        }
    });
    return min
}
var currency_type = {
    "wood": "FWW",
    "food": "FWF",
    "gold": "FWG"
}
var ConfigFee = 0;
let SellSettingPrice = 5;
let BuySettingPrice = 3;
var fwf = 0;
var fww = 0;
var fwg = 0;
//console.log("mina")
var TEMPLATES = null;
let get_currency = (element) => {
    try {
        return $(`#${element}_price_value`).val() * 1.0;
    } catch (error) {
        //console.log(error)
        return 0;
    }
}
let get_daily_cost = (template) => {
    let cur_fwf = get_currency("FWF");
    let cur_fwg = get_currency("FWG");
    let cur_fww = get_currency("FWW");
    let mine_token = (template.mine_fwf * cur_fwf + template.mine_fwg * cur_fwg + template.mine_fww * cur_fww)
    let cost_token = (template.cost_fwf * cur_fwf + template.cost_fwg * cur_fwg + template.cost_balley * MinBaley)
    let daily_cost = mine_token * (1 - (ConfigFee / 100)) - cost_token;
    //console.log("Tool " + template_id, TEMPLATES[template_id])
    //console.log(`Mine F: ${TEMPLATES[template_id].mine_fwf}*${get_currency("FWF")}`)
    //console.log(`Mine G: ${TEMPLATES[template_id].mine_fwg}*${get_currency("FWG")}`)
    //console.log(`Mine W: ${TEMPLATES[template_id].mine_fww}*${get_currency("FWW")}`)
    //console.log(`Mine token: ${mine_token}`)
    //console.log(`Cost F: ${template.cost_fwf}*${get_currency("FWF")}`)
    //console.log(`Cost G: ${template.cost_fwg}*${get_currency("FWG")}`)
    return daily_cost * ((WAX_Price / useUSD) * VND_Price);
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
    var url = "https://api.wax.alohaeos.com/v1/chain/get_table_rows";
    if (table == "config") {
        url = "https://wax.pink.gg/v1/chain/get_table_rows";
        name = "";
    }
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
        url: url,
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

let get_account_wallet = (name) => {
    return $.ajax({
        type: "GET",
        url: `https://wax.api.atomicassets.io/atomicassets/v1/accounts/${name}/farmersworld`,
        dataType: "json",
        contentType: "text/plain;charset=UTF-8",
        encode: true
    }).fail((result, status, error) => {
        console.warn("get_account_wallet: ", result);
    });
};
let create_block = (name) => {
    let html = `
                <div class="col-xl-4 col-lg-5 col-md-5">
                <div class="card profile_card  new_card">
                    <div class="card-header">
                        <div class="media">
                            <div class="media-body align-self-center">
                                <h4 class="mt-0 mb-5" style="text-align: center;">
                                    <span class="badge badge-outline badge-primary">${name}</span>
                                </h4>
                                <div>
                                    <a class="text-action" href="javascript:void(0)">
                                    <span class="badge bg-danger p-2" style="padding: 5px !important;">Balance</span>
                                        <i name="${name}_balance"> 1000</i>
                                    </a>
                                    <a class="text-action" href="javascript:void(0)">
                                    <span class="badge bg-danger p-2" style="padding: 5px !important;">Staked</span>
                                        <i name="${name}_staking"> 200</i>
                                    </a>
                                    <a class="text-action" href="javascript:void(0)">
                                    <span class="badge bg-danger p-2" style="padding: 5px !important;">Withdraw</span>
                                        <i name="${name}_withdraw">0</i>
                                    </a>
                                    
                                    <a class="text-action" href="javascript:void(0)">
                                    <span class="badge bg-danger p-2" style="padding: 5px !important;">Daily Profit</span>
                                        <i name="${name}_pr">0</i>
                                    </a>
                                    <a class="text-action" href="javascript:void(0)">
                                    <span class="badge bg-danger p-2" style="padding: 5px !important;">Gear</span>
                                        <i name="${name}_gear">0</i>
                                    </a>
                                    
                                    <a class="text-action" href="javascript:void(0)">
                                    <span class="badge bg-danger p-2" style="padding: 5px !important;">CPU</span>
                                        <i name="${name}_cpu"> 200</i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="media" test="account">
                            <div class="media-body" task="account">
                                <div class="row">
                                    <div class="col-3 ntf " style="font-weight: bold;">ACCOUNT</div>
                                    <div class="col-4 ntf" style="font-weight: bold;font-style: italic;">CPU: <span name="${name}_cpu" class="badge bg-danger p-2" style="padding: 5px !important;">20/300</span></div>

                                    <div class="col-5 ntf" style="font-weight: bold;font-style: italic;">Energy: <span name="${name}_energy" class="badge bg-danger p-2" style="padding: 5px !important;">20/300</span></div>
                                </div>
                                <div class="row">
                                    <div class="col-4 ntf" style="font-weight: bold;">Token:</div>
                                    <div class="col-4 ntf right" style="font-weight: bold;">Ingame:</div>
                                    <div class="col-4 ntf right" style="font-weight: bold;">Daily :</div>
                                </div>
                                <div class="row">
                                    <div class="col-3 ntf" name="${name}_acc_FWF">0</div>
                                    <div class="col-6 ntf center">
                                        <p class="mb-1" name="${name}_acc_f"><span><i class="fa fa-phone me-2 text-primary"></i></span>0</p>
                                    </div>
                                    <div class="col-3 ntf right" name="${name}_acc_f_cost">0</div>
                                </div>
                                <div class="row">
                                    <div class="col-3 ntf" name="${name}_acc_FWW">0</div>
                                    <div class="col-6 ntf center">
                                        <p class="mb-1" name="${name}_acc_w"><span><i class="fa fa-phone me-2 text-primary"></i></span>0</p>
                                    </div>
                                    <div class="col-3 ntf right" name="${name}_acc_w_cost">0</div>
                                </div>

                                <div class="row">
                                    <div class="col-3 ntf" name="${name}_acc_FWG">0</div>
                                    <div class="col-6 ntf center">
                                        <p class="mb-1" name="${name}_acc_g">0</p>
                                    </div>
                                    <div class="col-3 ntf right" name="${name}_acc_g_cost">0</div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-3 ntf" name="${name}_acc_COIN">0</div>
                                    <div class="col-6 ntf center">
                                        <p class="mb-1" name="${name}_acc_c"><span><i class="fa fa-phone me-2 text-primary"></i></span>0</p>
                                    </div>
                                    <div class="col-3 ntf right" name="${name}_acc_c_cost">0</div>
                                </div>
                                <div id="${name}_bonus"  class="row">
                                </div>
                            </div>
                        </div>
                        <div class="media" test="mining">
                            <div class="media-body">
                                <div class="row">
                                    <div class="col-6 ntf " style="font-weight: bold;">MINING</div>
                                    <div class="col-6 ntf"  style="font-weight: bold;font-style: italic;">Daily Profit: <span class="badge bg-danger p-2" style="padding: 5px !important;" id="${name}_acc_mining_cost">1118 W</span></div>
                                </div>
                                <div id="${name}_acc_mining" style="font-size:12px" class="row">
                                </div>
                            </div>
                        </div>
                        <div class="media" test="animals">
                            <div class="media-body" task="mining">
                                <div class="row">
                                    <div class="col-6 ntf " style="font-weight: bold;">Raising COW</div>
                                    <div class="col-6 ntf" style="font-weight: bold;font-style: italic;">Daily Cost: <span style="padding: 5px !important;"  id="${name}_acc_animal_cost">0 W</span></div>
                                </div>
                                <div id="${name}_acc_animals" style="font-size:12px"  class="row">
                                </div>
                            </div>
                        </div>
                        <div class="media" test="crops">
                            <div class="media-body" task="mining">
                                <div class="row">
                                    <div class="col-6 ntf " style="font-weight: bold;">CROPS</div>
                                    <div class="col-6 ntf" style="font-weight: bold;font-style: italic;">Daily Cost: <span  style="padding: 5px !important;" id="${name}_acc_crop_cost">0W</span></div>
                                </div>
                                <div id="${name}_acc_crop" style="font-size:12px"  class="row">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    `;
    return html;
}

function update_cost_mine(name, bonus_data = { "wood": 0, "food": 0, "gold": 0, "c": 0 }) {
    let f_cost = $(`div[name='${name}_acc_f_cost']`)[0].textContent;
    let g_cost = $(`div[name='${name}_acc_g_cost']`)[0].textContent;
    let w_cost = $(`div[name='${name}_acc_w_cost']`)[0].textContent;
    let c_cost = $(`div[name='${name}_acc_c_cost']`)[0].textContent;
    let ff = (f_cost * 1 + bonus_data['food'] * 1 * ((WAX_Price / useUSD) * VND_Price)).toFixed(2)
    let gg = (g_cost * 1 + bonus_data['gold'] * 1 * ((WAX_Price / useUSD) * VND_Price)).toFixed(2);
    let ww = (w_cost * 1 + bonus_data['wood'] * 1 * ((WAX_Price / useUSD) * VND_Price)).toFixed(2);
    let cc = (c_cost * 1 + bonus_data['c'] * 1 * ((WAX_Price / useUSD) * VND_Price)).toFixed(2);
    $(`div[name='${name}_acc_f_cost']`)[0].textContent = ff;
    $(`div[name='${name}_acc_g_cost']`)[0].textContent = gg;
    $(`div[name='${name}_acc_w_cost']`)[0].textContent = ww;
    $(`div[name='${name}_acc_c_cost']`)[0].textContent = cc;
    //  AM

    // 
}
let create_account_blocks = function(name) {
    if (TEMPLATES != null) {
        let html = create_block(name);
        $("#row_acc").append(html);
        // 
        update_cost_mine(name)
            // 
        get_account_info(name).done((acc_data) => {
            let staked = acc_data.voter_info.staked / 100000000;
            $(`i[name='${name}_staking']`).text(staked.toFixed(2))
            let cpu = parseInt((acc_data.cpu_limit.used / acc_data.cpu_limit.max) * 100)
                // $(`i[name='${name}_cpu']`).text(cpu)
            $(`span[name='${name}_cpu']`)[0].textContent = cpu;
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
                    $(`p[name='${name}_acc_f']`)[0].innerHTML = `${account_info_obj["FOOD"]}`;
                    $(`p[name='${name}_acc_w']`)[0].innerHTML = `${account_info_obj["WOOD"]}`;
                    $(`p[name='${name}_acc_g']`)[0].innerHTML = `${account_info_obj["GOLD"]}`;
                    get_account_balance(name).done((acc_balance) => {
                        acc_balance.balances.forEach(element => {
                            if (element.currency == "WAX") {
                                let balance = (element.amount * 1.0).toFixed(2);
                                $(`i[name='${name}_balance']`).text(balance)
                            } else {
                                let xxxx = (element.amount * 1.0).toFixed(2);
                                $(`div[name='${name}_acc_${element.currency}']`).text(xxxx)
                            }
                            // Count withdraw
                            let ff = chuanhoa($(`p[name='${name}_acc_f']`).text()) * 1;
                            let fw = chuanhoa($(`p[name='${name}_acc_w']`).text()) * 1;
                            let fg = chuanhoa($(`p[name='${name}_acc_g']`).text()) * 1;

                            let aw = $(`div[name='${name}_acc_FWW']`).text() * 1;
                            let af = $(`div[name='${name}_acc_FWF']`).text() * 1;
                            let ag = $(`div[name='${name}_acc_FWG']`).text() * 1;
                            let withdraw = 0
                            if (SwitchWD["F"]) {
                                withdraw += (ff * (1 - ConfigFee / 100) + af) * get_currency("FWF")
                            }
                            if (SwitchWD["G"]) {
                                withdraw += (fg * (1 - ConfigFee / 100) + ag) * get_currency("FWG")
                            }
                            if (SwitchWD["W"]) {
                                withdraw += (fw * (1 - ConfigFee / 100) + aw) * get_currency("FWW")
                            }
                            $(`i[name='${name}_withdraw']`).text(withdraw.toFixed(2))
                                // 
                        });
                        get_account_wallet(name).done((wallet) => {
                            wallet.data.templates.forEach(element => {
                                // 
                                if (element.template_id == "260676") {
                                    $(`div[name='${name}_acc_COIN']`).text(element.assets)
                                } else {
                                    $(`div[id='${name}_bonus']`).append(
                                        `
                                            <div class="col-3 ntf">${TEMPLATES[element.template_id].name}</div>
                                            <div class="col-3 ntf center">
                                                <p class="mb-1"><span><i class="fa fa-phone me-2 text-primary"></i></span>${element.assets}</p>
                                            </div>
                                        `
                                    )
                                }

                                // 
                            });
                        });
                    });
                });
            });
            // Start mining
            // $(`div[id='bugg4.wam_acc_mining']`).html('');
            $(`div[id='${name}_acc_mining']`).empty();
            $(`span[id='${name}_acc_mining_cost']`).text(0);
            // started
            $(`i[name='${name}_gear']`).text(0)
            get_rows("tools", name, 2).done((rows_data) => {
                var current_tools = {
                    "food": Infinity,
                    "gold": Infinity,
                    "wood": Infinity
                }
                rows_data.rows.forEach(element => {
                    let time_now = Math.round(new Date().getTime() / 1000);
                    let temp_id = element.template_id;
                    try {
                        let tm = MaxSell[temp_id];

                        update_gear(name, tm);
                    } catch (e) { console.log(e) }
                    let item = TEMPLATES[temp_id];
                    let item_name = item.name;
                    if (item.t_type != null) {
                        let sum_min = 1 * item.mine_fwf + 1 * item.mine_fww + 1 * item.mine_fwg;
                        if (sum_min < current_tools[item.t_type] && sum_min != 0) {
                            current_tools[item.t_type] = sum_min;
                        }
                    }
                    let daily_cost = get_daily_cost(item);
                    update_cost_mine(name, get_cost_mine(item))
                    let cur_cost = $(`span[id='${name}_acc_mining_cost']`).text() * 1;
                    $(`span[id='${name}_acc_mining_cost']`).text((cur_cost + daily_cost).toFixed(2));
                    let next_time = new Date((element.next_availability - time_now) * 1000).toISOString().substr(11, 8);
                    let current_durability = element.current_durability;
                    let durability = element.durability;
                    let html = `
                    <div class="col-12  ntf">
                        <div class="row" >
                            <div class="col-4 ntf">${item_name}</div>
                            <div class="col-5 ntf">${next_time}<span style="margin-left: 5px;" class="badge bg-danger">${current_durability} / ${durability}</span></div>
                            <div class="col-3 ntf right">${(daily_cost*((WAX_Price / useUSD)*VND_Price)).toFixed(2)} ${CurrentUsed}</div>
                            </div>
                        </div>
                    </div>
                    `;
                    $(`div[id='${name}_acc_mining']`).append(html)
                });
                get_rows("mbs", name, 2).done((rows_data) => {
                    rows_data.rows.forEach(element => {
                        let time_now = Math.round(new Date().getTime() / 1000);
                        let temp_id = element.template_id;
                        let item = TEMPLATES[temp_id];
                        try {
                            let tm = MaxSell[temp_id];
                            update_gear(name, tm);
                        } catch (e) { console.log(e) }
                        let item_name = item.name;
                        let farmer_coin = item.mine_farmer_coin;
                        var e_type = element.type;
                        let percent = 24;
                        var lowwer = e_type.toLowerCase();
                        let min_type = current_tools[lowwer];
                        let increase = parseInt(min_type / percent) // luong mine
                        let daily_cost = farmer_coin * get_currency("FARM") + increase * get_currency(currency_type[lowwer]);
                        let aaa = get_cost_mine(item)
                        aaa[lowwer] = increase;
                        update_cost_mine(name, aaa)
                        let cur_cost = $(`span[id='${name}_acc_mining_cost']`).text() * 1;
                        $(`span[id='${name}_acc_mining_cost']`).text((cur_cost + daily_cost * ((WAX_Price / useUSD) * VND_Price)).toFixed(2));
                        let next_time = new Date((element.next_availability - time_now) * 1000).toISOString().substr(11, 8);
                        // check min
                        // let percent = item.mine_fwf + mine_fwg + mine_fww;
                        // 
                        // nrf.s.c.wam
                        let html = `
                    <div class="col-12  ntf">
                        <div class="row" >
                            <div class="col-4 ntf">${item_name}</div>
                            <div class="col-5 ntf">${next_time}<span style="margin-left: 5px;" span class="badge bg-danger">${farmer_coin} / ${increase}</span></div>
                            <div class="col-3 ntf right">${(daily_cost* ((WAX_Price / useUSD)*VND_Price)).toFixed(2)} ${CurrentUsed}</div>
                        </div>
                    </div>
                    `;
                        $(`div[id='${name}_acc_mining']`).append(html)
                    });

                    get_rows("config", name, 1).done((rows_data) => {
                        rows_data.rows.forEach(element => {
                            ConfigFee = element.fee;
                            $(`span[task='FEE_price']`).text(ConfigFee);
                            $(`#FEE_price_value`).val(ConfigFee);
                        });
                        get_rows("animals", name, 2).done((rows_data) => {
                            var crops_cost = 0;
                            rows_data.rows.forEach(element => {
                                let time_now = Math.round(new Date().getTime() / 1000);
                                let temp_id = element.template_id;
                                let times_claimed = element.times_claimed;
                                let template = TEMPLATES[temp_id];
                                let item_name = template.name;
                                try {
                                    let tm = MaxSell[temp_id];

                                    update_gear(name, tm);
                                } catch (e) { console.log(e) }
                                let next_time = new Date((element.next_availability - time_now) * 1000).toISOString().substr(11, 8);
                                let daily_cost = get_daily_cost(template);
                                update_cost_mine(name, get_cost_mine(template))
                                crops_cost += daily_cost;
                                // 
                                let html = `
                    <div class="col-6">
                        <p>${item_name} ${next_time}<span class="badge bg-danger">${times_claimed}/${template.chuki}</span> </p>
                    </div>
                    `;
                                $(`div[id='${name}_acc_animals']`).append(html)
                            });
                            $(`span[id='${name}_acc_animal_cost']`).text(`${crops_cost.toFixed(2)}${CurrentUsed}`);

                            get_rows("crops", name, 2).done((rows_data) => {
                                var crops_cost = 0;
                                rows_data.rows.forEach(element => {
                                    let time_now = Math.round(new Date().getTime() / 1000);
                                    let temp_id = element.template_id;
                                    try {
                                        let tm = MaxSell[temp_id];

                                        update_gear(name, tm);
                                    } catch (e) { console.log(e) }
                                    let times_claimed = element.times_claimed;
                                    let template = TEMPLATES[temp_id];
                                    let item_name = template.name;
                                    let next_time = new Date((element.next_availability - time_now) * 1000).toISOString().substr(11, 8);
                                    let daily_cost = get_daily_cost(template);
                                    update_cost_mine(name, get_cost_mine(template))
                                    crops_cost += daily_cost;
                                    // 
                                    let html = `
                                        <div class="col-6">
                                            <p>${item_name} ${next_time}<span class="badge bg-danger">${times_claimed}/${template.chuki}</span> </p>
                                        </div>
                                    `;
                                    $(`div[id='${name}_acc_crop']`).append(html)
                                });
                                $(`span[id='${name}_acc_crop_cost']`).text(`${crops_cost.toFixed(2)}${CurrentUsed}`);
                                // Chay xong
                                $(`i[name='${name}_pr']`).text('0')
                                let all_profit = get_val($(`span[id='${name}_acc_crop_cost']`).text()) * 1 + get_val($(`span[id='${name}_acc_animal_cost']`).text()) * 1 + get_val($(`span[id='${name}_acc_mining_cost']`).text()) * 1;
                                $(`i[name='${name}_pr']`).text(all_profit.toFixed(2))
                            });
                        });
                    });
                });
            });

            // update
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
        let tmp = ["FWF", "FWW", "FWG", "USD", "WAX", "FARM"];
        tmp.forEach(element => {
            let price = response[element].last_price;
            let percent = response[element].change24
            try {
                $(`span[task='${element}_price']`).text(price.toFixed(3));
                $(`span[task='${element}_price_percent']`).text(percent.toFixed(2) + " %");
                $(`#${element}_price_value`).val(price);
                if (element == "WAX") {
                    WAX_Price = price;
                    var checked = $("input[name='usdChecked']:checked")[0].getAttribute("tag")
                    if (checked == "usd") {
                        CurrentUsed = "$";
                        useUSD = 1;
                        VND_Price = 1;
                    }
                    if (checked == "wax") {
                        CurrentUsed = "￦";
                        useUSD = WAX_Price;
                        VND_Price = 1;
                    }
                    if (checked == "vnd") {
                        VND_Price = GiaUSDT;
                        useUSD = 1;
                        CurrentUsed = "đ"
                    }
                }
                if (element == "USD") {
                    GiaUSDT = price;
                }
            } catch (e) {}
        });
    }).fail(function(response) {
        alert("Error");
        //console.log(response);
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
    //console.log(obj);
    try {
        let buy_ah = 0;
        try {
            buy_ah = obj.listing_price / 100000000;
        } catch (error) {
            buy_ah = obj.suggested_median;
        }
        let template_id = obj.assets[0].template.template_id;
        let template = TEMPLATES[template_id];
        let daily_cost = get_daily_cost(template);
        let cur_fwf = get_currency("FWF");
        let cur_fwg = get_currency("FWG");
        let cur_fww = get_currency("FWW");
        let mode = 2;
        let sell_ah = buy_ah * (1 - 1 / 100);
        if (mode == 2) {
            sell_ah = sell_ah * 0.91;
        }
        let craft_token = template.cr_fwf * cur_fwf + template.cr_fww * cur_fww + template.cr_fwg * cur_fwg;
        if (craft_token == 0) {
            craft_token = buy_ah;
        }
        let buy_craft = craft_token * (1 + ConfigFee / 100);
        let buy_dc = craft_token * (1 - BuySettingPrice / 100)
        let sell_dc = craft_token * (1 - SellSettingPrice / 100)
        var myArray = [buy_ah, buy_dc, craft_token, buy_craft];
        var roi = Math.ceil(get_min_buy(myArray) / daily_cost);

        let max_sell = get_max_sell(myArray)
        MaxSell[template_id] = max_sell;
        // $(`i[name='${name}_withdraw']`).text(0)
        let html = `
    <div class="media">
        <img src="/style/img/${template_id}.png" width="60" height="60" alt="" class="me-3  me-0 me-sm-3">
        <div class="media-body">
            <div class="row">
                <div class="col-6 ntf">Daily:</div>
                <div class="col-6 ntf right">${(daily_cost*(WAX_Price / useUSD)*VND_Price).toFixed(2)}${CurrentUsed}</div>
            </div>
            <div class="row">
                <div class="col-6 ntf">ROI:</div>
                <div class="col-6 ntf right">${roi}${CurrentUsed}</div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="row">Buy AH:<span>${(buy_ah*((WAX_Price / useUSD)*VND_Price)).toFixed(2)}${CurrentUsed}</span></div>
                    <div class="row">Sell AH:<span>${(sell_ah*((WAX_Price / useUSD)*VND_Price)).toFixed(2)}${CurrentUsed}</span></div>
                </div>
                <div class="col-4">
                    <div class="row">
                        Buy DC:<span>${buy_dc*((WAX_Price / useUSD)*VND_Price).toFixed(2)}${CurrentUsed}</span>
                    </div>
                    <div class="row">Sell DC:<span>${sell_dc*((WAX_Price / useUSD)*VND_Price).toFixed(2)}${CurrentUsed}</span></div>
                </div>
                <div class="col-4">
                    <div class="row">
                        Buy Craft:<span>${(buy_craft*((WAX_Price / useUSD)*VND_Price)).toFixed(2)}${CurrentUsed}</span></div>
                    <div class="row">
                        Craft:<span>${craft_token*((WAX_Price / useUSD)*VND_Price).toFixed(2)}${CurrentUsed}</span></div>
                </div>
            </div>
        </div>
    </div>
        `;
        $(`#${group}_tool_templates`).append(html);

    } catch (error) {
        console.log(TEMPLATES)
        console.log(error)
    }
}

let create_member_blocks = function(group, obj) {
    try {
        let buy_ah = 0;
        try {
            buy_ah = obj.listing_price / 100000000;
        } catch (error) {
            buy_ah = obj.suggested_median;
        }
        let template_id = obj.assets[0].template.template_id;
        let template = TEMPLATES[template_id];
        let daily_cost = get_daily_cost(template);
        let cur_fwf = get_currency("FWF");
        let cur_fwg = get_currency("FWG");
        let cur_fww = get_currency("FWW");
        let mode = 2;
        let sell_ah = buy_ah * (1 - 1 / 100);
        if (mode == 2) {
            sell_ah = sell_ah * 0.91;
        }
        let craft_token = template.cr_fwf * cur_fwf + template.cr_fww * cur_fww + template.cr_fwg * cur_fwg;
        if (craft_token == 0) {
            craft_token = buy_ah;
        }
        let buy_craft = craft_token * (1 + ConfigFee / 100);
        let buy_dc = craft_token * (1 - BuySettingPrice / 100)
        let sell_dc = craft_token * (1 - SellSettingPrice / 100)
        var myArray = [buy_ah, buy_dc, craft_token, buy_craft];
        var roi = Math.ceil(get_min_buy(myArray) / daily_cost);

        let max_sell = get_max_sell(myArray)
        MaxSell[template_id] = max_sell;
        let html = `
    <div class="media">
        <img src="/style/img/${template_id}.png" width="60" height="60" alt="" class="me-3  me-0 me-sm-3">
        <div class="media-body">
            <div class="row">
                <div class="col-6 ntf">Daily:</div>
                <div class="col-6 ntf right">${(daily_cost*((WAX_Price / useUSD)*VND_Price)).toFixed(2)}${CurrentUsed}</div>
            </div>
            <div class="row">
                <div class="col-6 ntf">ROI:</div>
                <div class="col-6 ntf right">${roi}${CurrentUsed}</div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="row">Buy AH:<span>${(buy_ah*((WAX_Price / useUSD)*VND_Price)).toFixed(2)}${CurrentUsed}</span></div>
                    <div class="row">Sell AH:<span>${(sell_ah*((WAX_Price / useUSD)*VND_Price)).toFixed(2)}${CurrentUsed}</span></div>
                </div>
                <div class="col-4">
                    <div class="row">
                        Buy DC:<span>${(buy_dc*((WAX_Price / useUSD)*VND_Price)).toFixed(2)}${CurrentUsed}</span>
                    </div>
                    <div class="row">Sell DC:<span>${(sell_dc*((WAX_Price / useUSD)*VND_Price)).toFixed(2)}${CurrentUsed}</span></div>
                </div>
                <div class="col-4">
                    <div class="row">
                        Buy Craft:<span>${(buy_craft*((WAX_Price / useUSD)*VND_Price)).toFixed(2)}${CurrentUsed}</span></div>
                    <div class="row">
                        Craft:<span>${(craft_token*((WAX_Price / useUSD)*VND_Price)).toFixed(2)}${CurrentUsed}</span></div>
                </div>
            </div>
        </div>
    </div>
        `;
        $(`#${group}_member_templates`).append(html);

    } catch (error) {
        console.log(TEMPLATES)
        console.log(error)
    }
}

let create_crop_blocks = function(group, obj) {
    try {
        let buy_ah = obj.listing_price / 100000000;
        if (buy_ah * 0 != 0) {
            buy_ah = obj.suggested_median / 100000000;
        }
        let template_id = 0;
        try {
            template_id = obj.assets[0].template.template_id;
        } catch (error) {
            template_id = obj.template_id;
        }
        let template = TEMPLATES[template_id];
        let daily_cost = get_daily_cost(template);
        let cur_fwf = get_currency("FWF");
        let cur_fwg = get_currency("FWG");
        let cur_fww = get_currency("FWW");
        let mode = 2;
        let sell_ah = buy_ah * (1 - 1 / 100);
        if (mode == 2) {
            sell_ah = sell_ah * 0.91;
        }
        let craft_token = template.cr_fwf * cur_fwf + template.cr_fww * cur_fww + template.cr_fwg * cur_fwg;
        if (craft_token == 0) {
            craft_token = buy_ah;
        }
        let buy_craft = craft_token * (1 + ConfigFee / 100);
        let buy_dc = craft_token * (1 - BuySettingPrice / 100)
        let sell_dc = craft_token * (1 - SellSettingPrice / 100)
        var myArray = [buy_ah, buy_dc, craft_token, buy_craft];
        var sellarr = [sell_ah, sell_dc];
        let tmp = get_min_buy(myArray);
        let max_sell = get_max_sell(myArray)
        MaxSell[template_id] = max_sell;
        if (template_id == "298597") {
            MinCaft = get_min_buy(sellarr)
                // console.log(MinCaft);
        }
        if (template_id == "318607") {
            MinCorn = get_min_buy(myArray)
                // console.log(MinCorn);
        }
        if (template_id == "318606") {
            MinBaley = tmp;
            // console.log(MinBaley);
        }
        var roi = Math.ceil(tmp / daily_cost);
        let bonus = '';
        let burn_html = '';
        if (template.burn > 0) {
            let burn_price = template.ex_fwg * get_currency("FWG") * (1 - ConfigFee / 100)
            burn_html = `
            <div class="row">
                Burn:<span>${burn_price.toFixed(2)}${CurrentUsed}</span>
            </div>`
        }

        if (template.diff > 0) {
            bonus = `
                <div class="row">
                    <div class="col-6 ntf">Daily:</div>
                    <div class="col-6 ntf right">${(daily_cost*((WAX_Price / useUSD)*VND_Price)).toFixed(2)}${CurrentUsed}</div>
                </div>
                <div class="row">
                    <div class="col-6 ntf">ROI:</div>
                    <div class="col-6 ntf right">${roi}</div>
                </div><span>`;
        }
        if (template_id == "298607") {
            MomCow = tmp;
            // console.log("MOM", MomCow)
            let milk = 3;
            let baley = 6;
            let daily_cost = milk * 140 * get_currency("FWG") * (1 - ConfigFee / 100) - baley * MinBaley;
            bonus = `
                <div class="row">
                    <div class="col-6 ntf">Daily:</div>
                    <div class="col-6 ntf right">${(daily_cost*((WAX_Price / useUSD)*VND_Price)).toFixed(2)}${CurrentUsed}</div>
                </div>
                <div class="row">
                    <div class="col-6 ntf">ROI:</div>
                    <div class="col-6 ntf right">${roi}</div>
                </div>`;
        }

        if (template_id == "298611") {
            let beby = 1.5;
            let corn = 9;
            // console.log("BULL, min buy", tmp)
            // console.log("MOM, min buy", MomCow)
            // console.log("MinCaft, buy", MinCaft)
            // console.log("MinCorn, buy", MinCorn)
            let daily_cost = (beby * MinCaft * (1 - ConfigFee / 100) - corn * MinCorn) / 3;
            // console.log("MOM, Daily", daily_cost)
            roi = Math.ceil((MomCow + tmp) / daily_cost);
            // console.log("MOM, ROI", roi)
            bonus = `
                <div class="row">
                    <div class="col-6 ntf">Daily:</div>
                    <div class="col-6 ntf right">${(daily_cost*((WAX_Price / useUSD)*VND_Price)).toFixed(2)}${CurrentUsed}</div>
                </div>
                <div class="row">
                    <div class="col-6 ntf">ROI:</div>
                    <div class="col-6 ntf right">${roi}</div>
                </div>`;
        }
        let html = `
            <div class="media">
                <img src="/style/img/${template_id}.png" width="60" height="60" alt="" class="me-3  me-0 me-sm-3">
                <div class="media-body">
                    ${bonus}
                    <div class="row">
                        <div class="col-4">
                            <div class="row">Buy AH:<span>${(buy_ah*((WAX_Price / useUSD)*VND_Price)).toFixed(2)}${CurrentUsed}</span></div>
                            <div class="row">Sell AH:<span>${(sell_ah*((WAX_Price / useUSD)*VND_Price)).toFixed(2)}${CurrentUsed}</span></div>
                        </div>
                        <div class="col-4">
                            <div class="row">
                                Buy DC:<span>${(buy_dc*((WAX_Price / useUSD)*VND_Price)).toFixed(2)}${CurrentUsed}</span>
                            </div>
                            <div class="row">Sell DC:<span>${(sell_dc*((WAX_Price / useUSD)*VND_Price)).toFixed(2)}${CurrentUsed}</span></div>
                        </div>
                        <div class="col-4">
                            <div class="row">
                                Buy Craft:<span>${(buy_craft*((WAX_Price / useUSD)*VND_Price)).toFixed(2)}${CurrentUsed}</span></div>
                            <div class="row">
                                Craft:<span>${(craft_token*((WAX_Price / useUSD)*VND_Price)).toFixed(2)}${CurrentUsed}</span>
                            </div>
                        </div>
                    </div>
                    ${burn_html}
                </div>
            </div>
        `;

        $(`#${group}_crop_templates`).append(html);

    } catch (error) {
        console.log(TEMPLATES)
        console.log(error)
    }
}
let create_tools_block = function() {
    if (TEMPLATES == null) {
        setTimeout(create_tools_block, 2000);
        return;
    }

    $(`i[name='${name}_withdraw']`).text(0)
    get_template_price_by_tool("CROP").done(function(response) {
        if (response.code != 200) {
            alert("Error");
            return;
        }
        for (let [group, data] of Object.entries(response.data)) {
            $(`#${group}_crop_templates`).empty();
            data.forEach(element => {
                create_crop_blocks(group, element)
            });
        }
    });
    return;
    get_template_price_by_tool("TOOL").done(function(response) {
        if (response.code != 200) {
            alert("Error");
            return;
        }
        for (let [group, data] of Object.entries(response.data)) {
            $(`#${group}_tool_templates`).empty();
            data.forEach(element => {
                create_tool_blocks(group, element)
            });
        }
    });
    get_template_price_by_tool("MEMBER").done(function(response) {
        if (response.code != 200) {
            alert("Error");
            return;
        }
        for (let [group, data] of Object.entries(response.data)) {
            $(`#${group}_member_templates`).empty();
            data.forEach(element => {
                create_member_blocks(group, element)
            });
        }
    });

}

function removeItemOnce(arr, value) {
    var index = arr.indexOf(value);
    if (index > -1) {
        arr.splice(index, 1);
    }
    return arr;
}

function CreateListAcc() {
    $("#row_acc").empty();
    ListAcc.forEach(acc => {
        if (acc != "") {
            create_account_blocks(acc)
        }
    });
}
$(document).ready(function() {
    $('input[name="wax"]').bind('input', function() {
        let wax = $(this).val();
        let wax_pr = $("input[name='wax_price']").val();
        let usd = $("input[name='usd_price']").val();
        $("input[name='usd']").val(wax * wax_pr * 1);
        $("input[name='vnd']").val(wax * wax_pr * usd * 1);
    });
    $('input[name="wax_price"]').bind('input', function() {
        let wax = $(this).val();
        let wax_pr = $("input[name='wax']").val();
        let usd = $("input[name='usd_price']").val();
        $("input[name='usd']").val(wax * wax_pr * 1);
        $("input[name='vnd']").val(wax * wax_pr * usd * 1);
    });
    $('input[name="usd_price"]').bind('input', function() {
        let usd_price = $(this).val();
        let wax = $("input[name='wax']").val();
        let wax_pr = $("input[name='wax_price']").val();
        $("input[name='vnd']").val(wax * wax_pr * usd_price * 1);
    });
    $(document).on('click', "#add_account", function() {
        let accv = $("#input_acc").val();
        let accs = accv.split(" ")
        for (let index = 0; index < accs.length; index++) {
            let acc = accs[index];
            if (acc != "" && !ListAcc.includes(acc)) {
                if ($("span[target='account']").length == 0) {
                    $("#list_acc").empty()
                }
                $("#list_acc").append(`<span target="account" class="badge badge-outline badge-success">${acc}</span>`)
                ListAcc.push(acc)
            }
        }
    })
    $(document).on('click', "#save_form", function() {
        var form = new FormData();
        let arr = $("#input_form input,select");
        for (let index = 0; index < arr.length; index++) {
            const element = arr[index];
            let name = element.getAttribute("name")
            let value = element.value;
            if (value == "" || value == 0) {
                alert("Chưa điền : " + name);
                return;
            }
            form.append(name, value);
        };
        tata.info('Lưu', 'Đang gửi thông tin', {
            animate: 'slide'
        })
        let username = $("#username").val()
        form.append("username", username);
        $("#save_form").prop('disabled', true);
        var settings = {
            "url": "/index.php/myapi/save_form",
            "method": "POST",
            "timeout": 0,
            "processData": false,
            "mimeType": "multipart/form-data",
            "contentType": false,
            "data": form
        };
        $.ajax(settings).done(function(response) {
            $("#save_form").prop('disabled', false);
            try {
                response = JSON.parse(response);
            } catch (error) {}
            if (response.code != 200) {
                alert(response.msg);
                return;
            }
            alert("Success");

        }).fail(function(response) {
            $("#save_form").prop('disabled', false);
            console.log(response);
            alert("Không thành công")
        });
    });
    $(document).on('click', "span[target='account']", function() {
        let span = $(this);
        let acc = span.text();
        if (acc != undefined || acc != "") {
            ListAcc = removeItemOnce(ListAcc, acc)
            span.remove();
            if ($("span[target='account']").length == 0) {
                $("#list_acc").append(`<span>Danh sách</span>`)
            }
        }
    })
    $(document).on('click', "input[name='usdChecked']", function() {
        var checked = $("input[name='usdChecked']:checked")[0].getAttribute("tag")
        if (checked == "usd") {
            CurrentUsed = "$";
            useUSD = 1;
            VND_Price = 1;
        }
        if (checked == "wax") {
            CurrentUsed = "￦";
            useUSD = WAX_Price;
            VND_Price = 1;
        }
        if (checked == "vnd") {
            VND_Price = GiaUSDT;
            CurrentUsed = "đ"
        }
    });
    $(document).on('click', "#update_interval_acc", function() {
        let val = $("#interval_acc").val();
        if (val == undefined || val == "") {
            return;
        }
        if (val > 60) {
            interval_accs = val * 1000;
            clearInterval(IntervalAcc)
            IntervalAcc = setInterval(CreateListAcc, interval_accs);
        }
    });
    $(document).on('click', "#update_account", function() {
        if (TEMPLATES == null) {
            alert("Wait some seconds");
            return;
        }
        CreateListAcc();
        IntervalAcc = setInterval(CreateListAcc, interval_accs);
    })
    get_template_config().done(function(response) {
        TEMPLATES = response;
        if (TEMPLATES != null) {
            create_tools_block();
            IntervalTools = setInterval(create_tools_block, interval_tools);
            get_report();
            IntervalReports = setInterval(get_report, interval_report);

        }
    })
    return;
});