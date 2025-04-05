let currentReceiverId = null;

function register() {
    $.post("register.php", {
        username: $("#reg_username").val(),
        password: $("#reg_password").val()
    }, function(response) {
        alert(response);
        if (response.trim() === "success") {
            window.location.href = "index.html";
        }
    });
}

function login() {
    $.post("login.php", {
        username: $("#login_username").val(),
        password: $("#login_password").val()
    }, function(response) {
        if (response.trim() === "success") {
            window.location.href = "chat.html";
        } else {
            alert("Invalid login");
        }
    });
}

function logout() {
    $.get("logout.php", function() {
        window.location.href = "index.html";
    });
}

function loadUsers() {
    $.get("users.php", function(data) {
        $("#user_list").html(data);
    });
}

function loadMessages() {
    if (currentReceiverId === null) return;

    $.get("load_messages.php", { receiver_id: currentReceiverId }, function(data) {
        $("#chat_messages").html(data);
    });
}

function sendMessage() {
    if (currentReceiverId === null) return;

    $.post("send_message.php", {
        receiver_id: currentReceiverId,
        message: $("#chat_input").val()
    }, function() {
        $("#chat_input").val("");
        loadMessages();
    });
}

function selectReceiver(receiverId) {
    currentReceiverId = receiverId;
    loadMessages();
}

$(document).ready(function() {
    if ($("#user_list").length) {
        setInterval(loadUsers, 2000);
        setInterval(loadMessages, 2000);
    }
});