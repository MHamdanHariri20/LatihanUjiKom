@extends('dashboard.layout')

@section('layout')
    <style>
            * {
        box-sizing: border-box;
        }

        body {
        background-color: #f1f1f1;
        padding: 20px;
        font-family: Arial;
        }

        .main {
        max-width: 1000px;
        margin: auto;
        }

        h1 {
        font-size: 50px;
        word-break: break-all;
        }

        .row {
        margin: 10px -16px;
        }

        .row,
        .row > .column {
        padding: 8px;
        }

        .column {
        float: left;
        width: 25%;
        display: none;
        }

        .row:after {
        content: "";
        display: table;
        clear: both;
        }

        .content {
        background-color: white;
        padding: 15px;
        }

        .content h4{
            margin: 20px 0 0 0;
            font-weight: bold;
        }

        .content p{
            margin: 5px 0 0 0;
        }

        .show {
        display: block;
        }

        .btn {
        border: none;
        outline: none;
        padding: 12px 16px;
        background-color: white;
        cursor: pointer;
        }

        .btn:hover {
        background-color: #ddd;
        }

        .btn.active {
        background-color: #666;
        color: white;
        }
    </style>

@endsection

<script>
    window.onload = function() {
        filterSelection("all");
    };

    function filterSelection(c) {
        var x, i;
        x = document.getElementsByClassName("column");
        if (c == "all") {
            for (i = 0; i < x.length; i++) {
                w3AddClass(x[i], "show");
            }
        } else {
            for (i = 0; i < x.length; i++) {
                w3RemoveClass(x[i], "show");
                if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
            }
        }

        // Update the "active" class for buttons
        var btnContainer = document.getElementById("myBtnContainer");
        var btns = btnContainer.getElementsByClassName("btn");
        for (var i = 0; i < btns.length; i++) {
            btns[i].classList.remove("active");
            if (c === "all" && i === 0) {
                btns[i].classList.add("active");
            } else if (btns[i].getAttribute("onclick").includes(c)) {
                btns[i].classList.add("active");
            }
        }
    }

    function w3AddClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
        }
    }

    function w3RemoveClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            while (arr1.indexOf(arr2[i]) > -1) {
                arr1.splice(arr1.indexOf(arr2[i]), 1);
            }
        }
        element.className = arr1.join(" ");
    }
</script>



