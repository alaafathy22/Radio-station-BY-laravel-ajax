function test() {
    if ($("#myAudio").attr("src") == "" || $("#myAudio").attr("src") == "#") {
        $("#alert_danger").css({
            display: "block",
        });
        $(".antialiased").addClass("animate__animated animate__shakeX");
        $("#alert_danger").css("display", "block");
        setTimeout(removeClassAlert, 3000);
    }
}

function removeClassAlert() {
    $("#alert_danger").css("display", "none");
    $(".antialiased").removeClass("animate__animated animate__shakeX");
}

const myTimeout = setTimeout(myGreeting, 3000);

function myGreeting() {
    $("#loading_body").hide("slow", function () {
        $("#loading_body").remove();
    });
}

function remove_text() {
    $("#search_channel").val(" ");
    $("#search_button").click();
    $("#icon_remove").css("display", "none");
}

function remove_text_on_write() {
    $("#icon_remove").css("display", "block");
}

function search_channel() {
    $.ajax({
        type: "GET",
        url: "/res_search",
        data: {
            search_text: $("#search_channel").val(),
        },
        success: function (data, textStatus, xhr) {
            document.getElementById("RowCard").remove();
            const RowCard = document.createElement("div");
            RowCard.setAttribute("class", "row RowCard");
            RowCard.setAttribute("id", "RowCard");
            document.getElementById("container").appendChild(RowCard);
            data.allData.forEach((element) => {
                if (element["name"].includes($("#search_channel").val())) {
                    const div_col = document.createElement("div");
                    div_col.setAttribute("class", "col-4");
                    const mycard2 = document.createElement("div");
                    mycard2.setAttribute("class", "mycard2 mycard");
                    mycard2.setAttribute("id", "mycard2");
                    const h6 = document.createElement("h6");
                    h6.setAttribute("class", "card-title");
                    const text_title = document.createTextNode(element["name"]);
                    h6.appendChild(text_title);
                    const button = document.createElement("button");
                    button.setAttribute("class", "btn btn-primary button_play");
                    button.setAttribute("id", "button_play" + element["id"]);
                    button.setAttribute(
                        "onclick",
                        "add_whiteList(" + element["id"] + ")"
                    );
                    const text_button = document.createTextNode("تشغيل");
                    button.appendChild(text_button);
                    mycard2.appendChild(h6);
                    mycard2.appendChild(button);
                    div_col.appendChild(mycard2);
                    RowCard.appendChild(div_col);
                } else {
                    var mycard2 = "false";
                }
            });

            if (
                document
                    .getElementById("RowCard")
                    .contains(document.getElementById("mycard2"))
            ) {
                $("#sorry").css("display", "none");
            } else {
                $("#sorry").css("display", "flex");
            }
        },
        error: function (xhr, status, error) {},
    });
}

function add_whiteList(id_station) {
    $("#alert_before_playing").css("display", "block");
    $("#alert_before_playing").removeClass("error_play");
    document.getElementById("alert_before_playing").innerHTML =
        "انتظر جارى التحميل";
    $.ajax({
        type: "GET",
        url: "/res",
        data: {
            id_station: id_station,
        },
        success: function (data, textStatus, xhr) {
            if (data.status == "true") {
                document.getElementById("alert_before_playing").innerHTML =
                    "مشغل";
                $("#alert_before_playing").removeClass("error_play");
                document
                    .getElementById("myAudio")
                    .setAttribute("autoplay", "true");
                $("#play_icon_button").css({
                    display: "none",
                });
                $("#pause_icon_button").css({
                    display: "flex",
                });
                $("#alert_danger").css({
                    display: "none",
                });
                $(".antialiased").removeClass(
                    "animate__animated animate__shakeX"
                );
            } else {
                document.getElementById("alert_before_playing").innerHTML =
                    " عفواً يوجد مشكله فى المحطة برجاء المحاوله ف وقت لاحق او تغيير المحطة";
                $("#alert_before_playing").toggleClass("error_play");
                $("#myAudio").removeAttr("autoplay");
                $("#play_icon_button").css("display", "flex");
                $("#pause_icon_button").css("display", "none");
            }
            $(".button_play").html("تشغيل");
            $(".button_play").removeClass("button_play_clicked");
            $("#button_play" + id_station).toggleClass("button_play_clicked");
            $("#button_play" + id_station).html("تم التشغيل");
            if (data.title_station) {
                $("#titel_player").html("تستمع إلى : " + data.title_station);
            }
            $("#play_icon_button").on("click", () => {
                if ($("#myAudio").attr("src") != "#") {
                    document.getElementById("myAudio").play();
                    document.getElementById("alert_before_playing").innerHTML =
                        "مشغل";
                    $("#alert_danger").css({
                        display: "none",
                    });
                    $("#play_icon_button").css({
                        display: "none",
                    });
                    $("#pause_icon_button").css({
                        display: "flex",
                    });
                }
            });
            $("#pause_icon_button").on("click", () => {
                document.getElementById("myAudio").pause();
                document.getElementById("alert_before_playing").innerHTML =
                    "متوقف";
                $("#play_icon_button").css("display", "flex");
                $("#pause_icon_button").css("display", "none");
            });
            document
                .getElementById("myAudio")
                .setAttribute("src", data.con_link_station);
        },
        error: function (xhr, status, error) {},
    });
}
