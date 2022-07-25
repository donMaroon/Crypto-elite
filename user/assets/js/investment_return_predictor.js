function predictEarning() {
    var amount = document.getElementById("amount").value;
    var plan = document.getElementById("plan").value;
    var res = "";
    switch (plan) {
        default:
            res = "<span style='color:red'>You have to select an investment plan</span>";
        case "select an investment plan":
            res = "<span style='color:red'>You have to select an investment plan</span>";
            break;
        case "Plan A (starter plan)":
            if (amount < 100 || amount > 1000) {
                res = "<span style='color:red'>Amount to be invested is lower or higher than the selected plan range</span>";
            } else {
                res = (amount * 0.15);
            }
            break;
        case "Plan B (premium plan)":
            if (amount < 1000 || amount > 10000) {
                res = "<span style='color:red'>Amount to be invested is lower or higher than the selected plan range</span>";
            } else {
                res = (amount * 0.5);
            }
            break;
        case "Plan C (Deluxe plan)":
            if (amount < 10000 || amount > 100000) {
                res = "<span style='color:red'>Amount to be invested is lower or higher than the selected plan range</span>";
            } else {
                res = (amount * 0.75);
            }
            break;
        case "Plan D (Exclusive plan)":
            if (amount < 100000 {
                res = "<span style='color:red'>Amount to be invested is lower  than the selected plan range</span>";
            } else {
                res = (amount * 1);
            }
            break;
    }
    document.getElementById("expectedEarningRes").innerHTML = res;
}