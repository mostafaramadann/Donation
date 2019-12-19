<?php
require_once ("IView.php");
class HomeView implements IView
{

    function showView($records)
    {
        echo
        "<!DOCTYPE html>
<html>
<body>
<head>
<link rel='stylesheet' href='CSS/Home.css'>
</head>

<script>

var iframe = document.createElement('iframe');
var html = '<body><h1>A Warm Welcome!</h1><p>Our donation welcomes all its users and thanks them for using online services</p>   </body>';
iframe.src = 'data:text/html;charset=utf-8,' + encodeURI(html);
iframe.style = 'background-color: beige;border:none;position:relative;top:20px'
iframe.width = '650'
iframe.height = '150'
document.body.appendChild(iframe);
console.log('iframe.contentWindow =', iframe.contentWindow);
</script>
<br>
<script>
var iframe = document.createElement('iframe');
var html = '<body><h1>A New and Easy way for donating!</h1><p>Donate to our institution for better future for all kids as we help them monthly by attaching them to schools, offerring clothes that fit all seasons</p><img src=\"https://media.istockphoto.com/vectors/happy-kids-jumping-together-during-a-sunny-day-vector-id871046604?k=6&m=871046604&s=612x612&w=0&h=ExorTPmQUX65-C-QKURZLnLvsWlErwa8Sy0DGE79dKk=\"></img></body>';

iframe.src = 'data:text/html;charset=utf-8,' + encodeURI(html);
iframe.style = 'background-color: beige;border:none;position:relative;top:20px'
iframe.width = '650'
iframe.height = '600'
document.body.appendChild(iframe);
console.log('iframe.contentWindow =', iframe.contentWindow);

</script>
<br>
        ";
    }
}