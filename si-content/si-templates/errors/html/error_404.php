<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>404 Not Found</title>
	<style>
		/* =============================================== /*
/*                                                 /* 
/*                      CSS Reset                  /*
/*                                                 /*
/* =============================================== */
html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed,
figure, figcaption, footer, header, hgroup,
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
  margin: 0;
  padding: 0;
  border: 0;
  font: inherit;
  font-size: 100%;
  vertical-align: baseline;
}

html {
  line-height: 1;
  overflow-y: hidden;
}

ol, ul {
  list-style: none;
}

table {
  border-collapse: collapse;
  border-spacing: 0;
}

caption, th, td {
  text-align: left;
  font-weight: normal;
  vertical-align: middle;
}

q, blockquote {
  quotes: none;
}
q:before, q:after, blockquote:before, blockquote:after {
  content: "";
  content: none;
}

a img {
  border: none;
}

article, aside, details, figcaption, figure, footer, header, hgroup, main, menu, nav, section, summary {
  display: block;
}

/* =============================================== /*
/*                     Animation                   /*
/* =============================================== */
/* Slide Code (Black Screen) */
@-webkit-keyframes slide {
  from {
    background-position: 0px 0px;
  }
  to {
    background-position: 0px 600px;
  }
}
@-moz-keyframes slide {
  from {
    background-position: 0px 0px;
  }
  to {
    background-position: 0px 600px;
  }
}
@-o-keyframes slide {
  from {
    background-position: 0px 0px;
  }
  to {
    background-position: 0px 600px;
  }
}
@keyframes slide {
  from {
    background-position: 0px 0px;
  }
  to {
    background-position: 0px 600px;
  }
}
/* Clock Animation */
@-webkit-keyframes time {
  to {
    transform: rotate(360deg);
  }
}
@-moz-keyframes time {
  to {
    transform: rotate(360deg);
  }
}
@-o-keyframes time {
  to {
    transform: rotate(360deg);
  }
}
@keyframes time {
  to {
    transform: rotate(360deg);
  }
}
body {
  background: #d9effd;
  background-image: linear-gradient(90deg, rgba(0, 0, 0, 0) 40%, #aacce2 40%);
  background-size: 25px 60px;
}

/* =============================================== /*
/*                                                 /* 
/*                      Workspace                  /*
/*                                                 /*
/* =============================================== */
#workspace div {
  position: absolute;
}
#workspace:before {
  content: '';
  position: absolute;
  z-index: 1;
  width: 100%;
  bottom: 0;
  background: #e2aabe;
  height: 68px;
  border-top: 9px solid #ae758a;
}
#workspace .desk {
  width: 990px;
  height: 100%;
  margin: auto;
  position: inherit;
}

/*
/*
/* =============================================== /*
/*                     Shelf                       /*
/* =============================================== */
#shelf {
  top: 30px;
  right: 5%;
  width: 272px;
  float: right;
  padding: 0 30px;
}
#shelf:after, #shelf:before {
  content: '';
  position: absolute;
  width: 100%;
  height: 15px;
  -moz-transform: skew(20deg);
  -ms-transform: skew(20deg);
  -webkit-transform: skew(20deg);
  transform: skew(20deg);
  background: #79a8c5;
  bottom: -23px;
  left: 2px;
}
#shelf:before {
  bottom: -15px;
  right: 2px;
}
#shelf div {
  height: 8px;
  width: 100%;
  position: absolute;
  bottom: -8px;
  background: #fff;
  right: 1px;
}
#shelf div:after {
  position: absolute;
  content: '';
  width: 100%;
  height: 8px;
  background: #79a8c5;
  bottom: -15px;
  right: -5px;
}
#shelf ul li {
  float: left;
}

/*
/*
/* =============================================== /*
/*               Clock animated By  Max            /*
/*          https://codepen.io/MyXoToD/pen/psLen    /*
/* =============================================== */
.clock {
  position: relative;
  height: 123px;
  width: 123px;
  background: white;
  box-sizing: border-box;
  -moz-border-radius: 100%;
  -webkit-border-radius: 100%;
  border-radius: 100%;
  border: 6px solid #5685A1;
  position: absolute;
  top: 30px;
  left: 5%;
  margin: auto;
}
.clock .top {
  position: absolute;
  width: 3px;
  height: 8px;
  background: #262626;
  left: 0;
  right: 0;
  margin: 0 auto;
}
.clock .right {
  position: absolute;
  width: 8px;
  height: 3px;
  background: #262626;
  top: 0;
  bottom: 0;
  right: 0;
  margin: auto 0;
}
.clock .bottom {
  position: absolute;
  width: 3px;
  height: 8px;
  background: #262626;
  left: 0;
  right: 0;
  bottom: 0;
  margin: 0 auto;
}
.clock .left {
  position: absolute;
  width: 8px;
  height: 3px;
  background: #262626;
  top: 0;
  bottom: 0;
  left: 0;
  margin: auto 0;
}
.clock .center {
  height: 6px;
  width: 6px;
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  margin: auto;
  background: #262626;
  -moz-border-radius: 100%;
  -webkit-border-radius: 100%;
  border-radius: 100%;
}
.clock .hour {
  width: 3px;
  height: 100%;
  position: absolute;
  left: 0;
  right: 0;
  margin: 0 auto;
  -webkit-animation: time 86400s infinite linear;
  -moz-animation: time 86400s infinite linear;
  -o-animation: time 86400s infinite linear;
  animation: time 86400s infinite linear;
}
.clock .hour:before {
  position: absolute;
  content: "";
  background: #262626;
  height: 60px;
  width: 3px;
  top: 30px;
}
.clock .minute {
  width: 1px;
  height: 100%;
  position: absolute;
  left: 0;
  right: 0;
  margin: 0 auto;
  -webkit-animation: time 3600s infinite linear;
  -moz-animation: time 3600s infinite linear;
  -o-animation: time 3600s infinite linear;
  animation: time 3600s infinite linear;
}
.clock .minute:before {
  position: absolute;
  content: "";
  background: #262626;
  height: 40px;
  width: 1px;
  top: 50px;
}
.clock .second {
  width: 2px;
  height: 100%;
  position: absolute;
  left: 0;
  right: 0;
  margin: 0 auto;
  -webkit-animation: time 60s infinite linear;
  -moz-animation: time 60s infinite linear;
  -o-animation: time 60s infinite linear;
  animation: time 60s infinite linear;
}
.clock .second:before {
  position: absolute;
  content: "";
  background: #fd1111;
  height: 45px;
  width: 2px;
  top: 45px;
}

/*
/*
/* =============================================== /*
/*                 iPad & iPhone                   /*
/* =============================================== */
.ipad {
  position: relative;
  background: #2c2c2c;
  border: 8px solid #fff;
  width: 55px;
  height: 80px;
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
  border-radius: 5px;
}
.ipad:before {
  position: absolute;
  bottom: -7px;
  left: 50%;
  content: '';
  width: 5px;
  height: 6px;
  -moz-border-radius: 50%;
  -webkit-border-radius: 50%;
  border-radius: 50%;
  background-color: #2c2c2c;
}

/*
/*
/* =============================================== /*
/*                      Books                      /*
/* =============================================== */
.books {
  margin-left: 10px;
  width: 190px;
  position: relative;
  top: 4px;
}
.books span {
  float: left;
  position: relative;
  /* Orange */
  /* Yellow */
  /* White */
  /* Blue */
  /* Positions */
  /* Books Decoration*/
  /* Book 2 */
  /* Book 4 */
  /* Book 5 */
  /* Book 6 */
  /* Book 8 */
  /* Book 9 */
  /* Book 10 */
  /* Book 11 */
}
.books span:nth-child(1), .books span:nth-child(12), .books span:nth-child(4), .books span:nth-child(6) {
  width: 15px;
  height: 61px;
  background-color: #eb594a;
}
.books span:nth-child(4) {
  width: 8px;
  height: 84px;
}
.books span:nth-child(3), .books span:nth-child(7), .books span:nth-child(9) {
  width: 8px;
  height: 69px;
  background-color: #f5b400;
}
.books span:nth-child(9), .books span:nth-child(6), .books span:nth-child(5), .books span:nth-child(10) {
  width: 16px;
  height: 92px;
}
.books span:nth-child(8), .books span:nth-child(11) {
  width: 23px;
  height: 77px;
  background-color: #fff;
}
.books span:nth-child(2), .books span:nth-child(5), .books span:nth-child(10) {
  background-color: #0e3757;
}
.books span:nth-child(2) {
  width: 24px;
  height: 77px;
}
.books span:nth-child(1), .books span:nth-child(12) {
  top: 31px;
}
.books span:nth-child(2), .books span:nth-child(8), .books span:nth-child(11) {
  top: 15px;
}
.books span:nth-child(3), .books span:nth-child(7) {
  top: 23px;
}
.books span:nth-child(4) {
  top: 8px;
}
.books span:nth-child(2):before, .books span:nth-child(4):before, .books span:nth-child(5):before, .books span:nth-child(6):before, .books span:nth-child(8):before, .books span:nth-child(9):before, .books span:nth-child(10):before, .books span:nth-child(11):before {
  content: '';
  display: block;
  position: absolute;
  width: 100%;
  height: 50%;
  top: 22px;
}
.books span:nth-child(2) {
  /* Diamond Narrow "Joseph Silber" */
}
.books span:nth-child(2):before {
  background-color: #fff;
}
.books span:nth-child(2) i {
  display: block;
  width: 0;
  height: 0;
  border: 7px solid transparent;
  border-bottom: 15px solid #f3b502;
  position: relative;
  left: 5px;
  top: 19px;
}
.books span:nth-child(2) i:after {
  content: '';
  position: absolute;
  top: 15px;
  left: -7px;
  width: 0;
  height: 0;
  border: 7px solid transparent;
  border-top: 15px solid #f3b502;
}
.books span:nth-child(4):before {
  background-color: #fff;
  height: 77%;
  top: 10px;
}
.books span:nth-child(5):before {
  background-color: #86cccc;
  height: 69%;
  top: 16px;
}
.books span:nth-child(5):after {
  content: '';
  display: block;
  height: 7px;
  width: 7px;
  background-color: #fdfffc;
  -moz-border-radius: 50%;
  -webkit-border-radius: 50%;
  border-radius: 50%;
  position: relative;
  top: 20px;
  left: 4px;
}
.books span:nth-child(6):before {
  background-image: linear-gradient(rgba(0, 0, 0, 0) 40%, #ffffff 40%);
  background-size: 16px 34px;
  background-repeat: repeat-y;
  height: 98%;
  top: 2px;
}
.books span:nth-child(8):before {
  background-color: #86cccc;
  height: 64%;
  top: 15px;
}
.books span:nth-child(8):after {
  content: '';
  display: block;
  position: absolute;
  width: 15px;
  height: 31px;
  background-color: #ec5b4a;
  -moz-border-radius: 100%;
  -webkit-border-radius: 100%;
  border-radius: 100%;
  top: 24px;
  left: 4px;
}
.books span:nth-child(9):before {
  background-color: #ec5a4b;
  height: 65%;
  top: 17px;
}
.books span:nth-child(9):after {
  content: '';
  display: block;
  position: relative;
  background-color: #fff;
  width: 3px;
  height: 50%;
  top: 22px;
  left: 7px;
}
.books span:nth-child(10):before {
  background-color: #fff;
}
.books span:nth-child(10):after {
  width: 50%;
  height: 35px;
  content: '';
  display: block;
  position: relative;
  top: 25px;
  left: 8px;
  background-image: linear-gradient(rgba(0, 0, 0, 0) 40%, #f5af01 40%);
  background-size: 9px 7px;
  background-repeat: repeat-y;
}
.books span:nth-child(11):before {
  background-color: #86cccc;
}

/*
/*
/* =============================================== /*
/*                     Table                       /*
/* =============================================== */
.table {
  position: absolute;
  bottom: 33px;
  z-index: 1;
  width: 898px;
  height: 297px;
  margin-left: 92px;
  -moz-transition-property: margin-left;
  -o-transition-property: margin-left;
  -webkit-transition-property: margin-left;
  transition-property: margin-left;
  -moz-transition-duration: 1s;
  -o-transition-duration: 1s;
  -webkit-transition-duration: 1s;
  transition-duration: 1s;
}
.table:after {
  position: absolute;
  content: '';
  background: #ccbdac;
  -moz-box-shadow: 0 1px 7px 0 #958A7E;
  -webkit-box-shadow: 0 1px 7px 0 #958A7E;
  box-shadow: 0 1px 7px 0 #958A7E;
  height: 21px;
  width: 100%;
}
.table:before {
  position: absolute;
  content: '';
  background: #e0ceb8;
  height: 100%;
  width: 31px;
}
.table .right-tb {
  position: absolute;
  right: 0;
  width: 233px;
  height: 274px;
  padding: 23px 0 0 20px;
  background: #e0ceb8;
}
.table .right-tb:after {
  content: '';
  width: 100%;
  height: 5px;
  position: absolute;
  bottom: -4px;
  background: #CA98AB;
  border-radius: 100%;
  right: 1px;
}
.table .right-tb span {
  position: relative;
  padding: 2px;
  border: 2px solid #BBAA95;
  width: 205px;
  height: 70px;
  margin-top: 10px;
  display: block;
}
.table .right-tb span:before {
  content: '';
  background: #CEBCA7;
  position: absolute;
  width: 205px;
  height: 70px;
}
.table .right-tb span:after {
  content: '';
  background: #fff;
  position: absolute;
  width: 69px;
  height: 15px;
  left: 73px;
  top: 18px;
  -moz-border-radius: 15px 15px 0 0;
  -webkit-border-radius: 15px;
  border-radius: 15px 15px 0 0;
  border-bottom: 2px solid #9b8b77;
}

/*
/*
/* =============================================== /*
/*                     Mouse                       /*
/* =============================================== */
.mouse {
  position: absolute;
  background: #fff;
  width: 40px;
  height: 24px;
  top: -24px;
  left: 430px;
  -moz-border-radius: 23px 23px 0 0;
  -webkit-border-radius: 23px;
  border-radius: 23px 23px 0 0;
  -moz-transition-property: left;
  -o-transition-property: left;
  -webkit-transition-property: left;
  transition-property: left;
  -moz-transition-duration: 1s;
  -o-transition-duration: 1s;
  -webkit-transition-duration: 1s;
  transition-duration: 1s;
}

/*
/*
/* =============================================== /*
/*                     Cup                         /*
/* =============================================== */
.cup {
  position: absolute;
  z-index: 1;
  background: #eb9673;
  width: 42px;
  height: 55px;
  top: -55px;
  left: 195px;
  -moz-border-radius: 0 0 3px 3px;
  -webkit-border-radius: 0;
  border-radius: 0 0 3px 3px;
}
.cup:after {
  content: '';
  position: absolute;
  background: #c68060;
  width: 100%;
  height: 5px;
  bottom: 0;
  -moz-border-radius: 0 0 3px 3px;
  -webkit-border-radius: 0;
  border-radius: 0 0 3px 3px;
}
.cup:before {
  content: '';
  position: absolute;
  width: 13px;
  height: 29px;
  top: 8px;
  left: -18px;
  -moz-border-radius: 20px 0 0 20px;
  -webkit-border-radius: 20px;
  border-radius: 20px 0 0 20px;
  border: 5px solid #eb9673;
  border-right: none;
}
.cup i {
  position: absolute;
  width: 2px;
  height: 17px;
  background: #fff;
  left: 22px;
}
.cup i:before {
  content: '';
  position: absolute;
  width: 12px;
  height: 13px;
  background: #444;
  top: 17px;
  left: -5px;
  -moz-border-radius: 4px;
  -webkit-border-radius: 4px;
  border-radius: 4px;
}
.cup i:after {
  content: '';
  position: absolute;
  background: #dbd13a;
  width: 12px;
  height: 4px;
  top: 20px;
  left: -5px;
}

/*
/*
/*
/* =============================================== /*
/*                     Router                      /*
/* =============================================== */
.router {
  background: #424242;
  position: absolute;
  width: 84px;
  height: 20px;
  top: -22px;
  left: 20px;
}
.router:before, .router:after {
  background: #424242;
  content: '';
  position: absolute;
  width: 16px;
  height: 2px;
  top: 20px;
  right: 5px;
}
.router:after {
  right: inherit;
  left: 5px;
}
.router ul {
  content: '';
  position: absolute;
  width: 4px;
  height: 31px;
  top: -35px;
  -moz-perspective: 19px;
  -webkit-perspective: 19px;
  perspective: 19px;
  left: 6px;
}
.router ul:before {
  content: '';
  position: absolute;
  background: #424242;
  -moz-transform: rotateX(45deg);
  -webkit-transform: rotateX(45deg);
  transform: rotateX(45deg);
  width: 100%;
  height: 100%;
  outline: 1px solid transparent;
}
.router ul:after {
  content: '';
  background: #424242;
  position: absolute;
  width: 8px;
  height: 8px;
  -moz-border-radius: 50%;
  -webkit-border-radius: 50%;
  border-radius: 50%;
  left: -2px;
  top: 2px;
}
.router ul li {
  position: absolute;
  width: 4px;
  height: 4px;
  background: #fff;
  top: 43px;
}
.router ul li:first-child {
  -moz-border-radius: 50%;
  -webkit-border-radius: 50%;
  border-radius: 50%;
}
.router ul li:first-child:after, .router ul li:first-child:before, .router ul li:first-child i {
  content: '';
  position: absolute;
  width: 4px;
  height: 4px;
  background: #fff;
  left: 6px;
  -moz-border-radius: 50%;
  -webkit-border-radius: 50%;
  border-radius: 50%;
}
.router ul li:first-child:before {
  left: 12px;
}
.router ul li:first-child i {
  left: 18px;
}
.router ul li:nth-child(2) {
  width: 8px;
  height: 8px;
  left: 65px;
  top: 41px;
}

/*
/*
/*
/* =============================================== /*
/*                   Black Screen                  /*
/* =============================================== */
.bk-screen {
  position: absolute;
  width: 180px;
  height: 241px;
  background: #343441;
  border: 8px solid #525151;
  right: 45px;
  top: -296px;
  background: url(http://i39.tinypic.com/2w5oktu.jpg);
  background-size: 100%;
  -webkit-animation: slide 15s linear infinite;
  -moz-animation: slide 15s linear infinite;
  -o-animation: slide 15s linear infinite;
  animation: slide 15s linear infinite;
}
.bk-screen:before {
  content: '';
  position: absolute;
  background: #343434;
  width: 78px;
  height: 17px;
  bottom: -25px;
  left: 51px;
}
.bk-screen:after {
  content: '';
  position: absolute;
  width: 76px;
  height: 0;
  bottom: -38px;
  right: 38px;
  border-bottom: 14px solid #626262;
  border-left: 13px solid transparent;
  border-right: 14px solid transparent;
}
.bk-screen i {
  position: absolute;
  background: #343434;
  width: 103px;
  height: 9px;
  bottom: -47px;
  left: 39px;
}

/*
/*
/* =============================================== /*
/*                     Chair                       /*
/* =============================================== */
.chair {
  position: absolute;
  width: 165px;
  height: 436px;
  bottom: 34px;
  z-index: 2;
  margin-left: 575px;
  -moz-transition-property: margin-left;
  -o-transition-property: margin-left;
  -webkit-transition-property: margin-left;
  transition-property: margin-left;
  -moz-transition-duration: 1s;
  -o-transition-duration: 1s;
  -webkit-transition-duration: 1s;
  transition-duration: 1s;
}
.chair:after {
  content: '';
  position: absolute;
  width: 165px;
  height: 231px;
  background: #3a3a3a;
  -moz-border-radius: 10px;
  -webkit-border-radius: 10px;
  border-radius: 10px;
}
.chair:before {
  content: '';
  position: absolute;
  background: #7d7d7d;
  width: 12px;
  height: 10px;
  left: 76px;
  top: 231px;
}
.chair ul {
  position: absolute;
  width: 165px;
  height: 23px;
  background: #3a3a3a;
  top: 240px;
  -moz-border-radius: 0 0 15px 15px;
  -webkit-border-radius: 0;
  border-radius: 0 0 15px 15px;
}
.chair ul:before {
  content: '';
  position: absolute;
  background: #656565;
  width: 141px;
  height: 11px;
  top: 23px;
  left: 10px;
}
.chair ul:after {
  content: '';
  position: absolute;
  background: #4b4b4b;
  width: 37px;
  height: 7px;
  top: 34px;
  left: 62px;
}
.chair ul li:first-child {
  width: 18px;
  height: 156px;
  position: absolute;
  left: 75px;
  top: 41px;
  -moz-perspective: 99px;
  -webkit-perspective: 99px;
  perspective: 99px;
}
.chair ul li:first-child:after {
  content: '';
  position: absolute;
  top: 16px;
  width: 14px;
  height: 167px;
  background: #4b4b4b;
  -moz-transform: rotateX(160deg);
  -webkit-transform: rotateX(160deg);
  transform: rotateX(160deg);
  outline: 1px solid transparent;
}
.chair ul li:nth-child(2), .chair ul li:nth-child(3) {
  position: absolute;
  width: 11px;
  height: 96px;
  top: 121px;
  -moz-perspective: 99px;
  -webkit-perspective: 99px;
  perspective: 99px;
  -moz-transform: rotate(228deg);
  -ms-transform: rotate(228deg);
  -webkit-transform: rotate(228deg);
  transform: rotate(228deg);
  left: 33px;
}
.chair ul li:nth-child(2):after, .chair ul li:nth-child(3):after {
  content: '';
  background: #4b4b4b;
  position: absolute;
  top: -24px;
  width: 11px;
  height: 123px;
  -moz-transform: rotateX(45deg);
  -webkit-transform: rotateX(45deg);
  transform: rotateX(45deg);
  outline: 1px solid transparent;
}
.chair ul li:nth-child(3) {
  left: 120px;
  -moz-transform: rotate(131deg);
  -ms-transform: rotate(131deg);
  -webkit-transform: rotate(131deg);
  transform: rotate(131deg);
}

/*
/*
/* =============================================== /*
/*                     Trash                       /*
/* =============================================== */
.trash {
  position: absolute;
  bottom: 9px;
  margin-left: 23px;
  z-index: 2;
  width: 71px;
  height: 96px;
  outline: 1px solid transparent;
  -moz-perspective: 150px;
  -webkit-perspective: 150px;
  perspective: 150px;
  -moz-transform: rotate(180deg);
  -ms-transform: rotate(180deg);
  -webkit-transform: rotate(180deg);
  transform: rotate(180deg);
}
.trash:before {
  content: '';
  position: absolute;
  width: 75px;
  height: 120px;
  background: #fff;
  -moz-transform: rotateX(45deg);
  -ms-transform: rotateX(45deg);
  -webkit-transform: rotateX(45deg);
  transform: rotateX(45deg);
  left: -1px;
}
.trash:after {
  content: '';
  position: absolute;
  width: 113px;
  height: 7px;
  background: #353C44;
  top: 122px;
  left: -19px;
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
  border-radius: 5px;
}
.trash .shadows {
  top: 21px;
  width: 104px;
  height: 3px;
  left: -34px;
}

/*
/*
/* =============================================== /*
/*                     iMac                        /*
/* =============================================== */
.imac {
  z-index: 0;
  margin-top: -274px;
  margin-left: 149px;
  width: 289px;
  height: 175px;
  background: #5e5e5e;
  border: 10px solid #fff;
  border-bottom: 41px solid #fff;
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
  border-radius: 5px;
  -moz-transition-property: margin-left;
  -o-transition-property: margin-left;
  -webkit-transition-property: margin-left;
  transition-property: margin-left;
  -moz-transition-duration: 1s;
  -o-transition-duration: 1s;
  -webkit-transition-duration: 1s;
  transition-duration: 1s;
  /* From https://codepen.io/JTParrett/pen/FGyft */
}
.imac:after {
  content: '';
  position: absolute;
  top: 216px;
  left: 104px;
  width: 50px;
  height: 26px;
  background: #AEAEAE;
  border: 20px solid #D9EFFD;
  border-top: 0;
  border-bottom: 20px solid #fff;
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
  border-radius: 5px;
  -moz-box-shadow: 0px 4px 0px -2px #909090;
  -webkit-box-shadow: 0px 4px 0px -2px #909090;
  box-shadow: 0px 4px 0px -2px #909090;
}
.imac img {
  width: 100%;
  height: 100%;
}

/*
/*
/* =============================================== /*
/*                     Note                        /*
/* =============================================== */
.note {
  width: 31px;
  height: 21px;
  position: absolute;
  background: #f9ec3e;
  bottom: -33px;
  border-top: 6px solid #cac222;
  -moz-transform: rotate(-12deg);
  -ms-transform: rotate(-12deg);
  -webkit-transform: rotate(-12deg);
  transform: rotate(-12deg);
  -moz-box-shadow: 0 1px 2px #dcdcdc;
  -webkit-box-shadow: 0 1px 2px #dcdcdc;
  box-shadow: 0 1px 2px #dcdcdc;
  font-size: 11px;
  text-align: center;
  padding-top: 7px;
}

/*
/*
/* =============================================== /*
/*                     iPhone                      /*
/* =============================================== */
.iphone {
  position: absolute;
  top: -64px;
  right: 30px;
  width: 37px;
  height: 64px;
  background: #ededed;
  -moz-border-radius: 3px;
  -webkit-border-radius: 3px;
  border-radius: 3px;
}
.iphone:before {
  position: absolute;
  content: '';
  width: 29px;
  height: 48px;
  background: #2c2c2c;
  top: 5px;
  left: 4px;
}
.iphone:after {
  position: absolute;
  content: '';
  width: 5px;
  height: 5px;
  -moz-border-radius: 50%;
  -webkit-border-radius: 50%;
  border-radius: 50%;
  background: #2c2c2c;
  top: 56px;
  left: 16px;
}

/* =============================================== /*
/*                      shadows                    /*
/* =============================================== */
.shadows {
  content: '';
  width: 100%;
  height: 5px;
  position: absolute;
  bottom: -4px;
  background: #CA98AB;
  border-radius: 100%;
  z-index: 0;
}

/* =============================================== /*
/*                                                 /* 
/*                     Responsive                  /*
/*                                                 /*
/* =============================================== */
@media only screen and (max-height: 805px) {
  #workspace .desk {
    width: 724px;
  }

  /* Clock */
  .clock {
    width: 100px;
    height: 100px;
  }
  .clock .hour:before {
    height: 34px;
    top: 41px;
  }
  .clock .minute:before {
    height: 31px;
    top: 46px;
  }
  .clock .second:before {
    height: 33px;
    top: 45px;
  }

  /* Shelf */
  #shelf {
    width: 206px;
  }
  #shelf div:after {
    right: -5px;
  }
  #shelf .ipad {
    width: 47px;
    height: 69px;
    border: 7px solid #fff;
  }
  #shelf .ipad:before {
    bottom: -6px;
    width: 4px;
    height: 5px;
  }
  #shelf .books {
    width: 134px;
    top: 10px;
  }
  #shelf .books span:nth-child(1), #shelf .books span:nth-child(12),
  #shelf .books span:nth-child(4), #shelf .books span:nth-child(6) {
    width: 10px;
    height: 43px;
    top: 30px;
  }
  #shelf .books span:nth-child(2) {
    width: 17px;
    height: 65px;
    top: 7px;
  }
  #shelf .books span:nth-child(2):before,
  #shelf .books span:nth-child(4):before,
  #shelf .books span:nth-child(5):before,
  #shelf .books span:nth-child(6):before,
  #shelf .books span:nth-child(8):before,
  #shelf .books span:nth-child(9):before,
  #shelf .books span:nth-child(10):before, #shelf .books span:nth-child(11):before {
    top: 17px;
  }
  #shelf .books span:nth-child(2) i {
    border: 5px solid transparent;
    border-bottom: 13px solid #F3B502;
    left: 4px;
    top: 16px;
  }
  #shelf .books span:nth-child(2) i:after {
    left: -5px;
    top: 13px;
    border: 5px solid transparent;
    border-top: 13px solid #F3B502;
  }
  #shelf .books span:nth-child(3), #shelf .books span:nth-child(7),
  #shelf .books span:nth-child(9) {
    width: 5px;
    height: 49px;
  }
  #shelf .books span:nth-child(4) {
    width: 6px;
    height: 59px;
    top: 13px;
  }
  #shelf .books span:nth-child(4):before {
    top: 7px !important;
  }
  #shelf .books span:nth-child(9), #shelf .books span:nth-child(6),
  #shelf .books span:nth-child(5), #shelf .books span:nth-child(10) {
    width: 11px;
    height: 65px;
    top: 8px;
  }
  #shelf .books span:nth-child(5):before {
    top: 10px !important;
  }
  #shelf .books span:nth-child(5):after {
    width: 5px;
    height: 5px;
    top: 13px;
    left: 3px;
  }
  #shelf .books span:nth-child(6):before {
    background-size: 16px 18px;
    height: 84%;
    top: 2px !important;
  }
  #shelf .books span:nth-child(8), #shelf .books span:nth-child(11) {
    width: 17px;
    height: 54px;
    top: 18px;
  }
  #shelf .books span:nth-child(8):before, #shelf .books span:nth-child(11):before {
    top: 10px;
  }
  #shelf .books span:nth-child(8):after, #shelf .books span:nth-child(11):after {
    top: 15px;
    left: 4px;
    width: 10px;
    height: 24px;
  }
  #shelf .books span:nth-child(9):after {
    left: 4px;
  }
  #shelf .books span:nth-child(10):after {
    top: 15px;
  }
  #shelf .books span:nth-child(11):before {
    height: 35px;
  }

  /* Table */
  .table {
    width: 639px;
    height: 211px;
    margin-left: 81px;
  }
  .table .right-tb {
    width: 165px;
    height: 191px;
    padding: 20px 0 0 13px;
  }
  .table .right-tb span {
    width: 144px;
    height: 46px;
    margin-top: 8px;
  }
  .table .right-tb span:before {
    width: 144px;
    height: 46px;
  }
  .table .right-tb span:after {
    left: 51px;
    top: 14px;
    width: 47px;
    height: 10px;
  }
  .table:before {
    width: 24px;
  }
  .table:after {
    height: 15px;
  }

  /* Chair */
  .chair {
    margin-left: 432px;
    width: 119px;
    height: 310px;
  }
  .chair:after {
    height: 165px;
    width: 119px;
  }
  .chair:before {
    width: 8px;
    height: 7px;
    top: 165px;
    left: 60px;
  }
  .chair ul {
    width: 119px;
    height: 15px;
    top: 172px;
  }
  .chair ul:before {
    width: 98px;
    height: 8px;
    top: 15px;
  }
  .chair ul:after {
    width: 25px;
    height: 4px;
    top: 23px;
    left: 51px;
  }
  .chair ul li:first-child {
    left: 60px;
    top: 31px;
  }
  .chair ul li:first-child:after {
    top: 7px;
    width: 10px;
    height: 108px;
  }
  .chair ul li:nth-child(2), .chair ul li:nth-child(3) {
    top: 62px;
  }
  .chair ul li:nth-child(2):after, .chair ul li:nth-child(3):after {
    width: 6px;
    height: 109px;
  }
  .chair ul li:nth-child(3) {
    left: 83px;
    top: 67px;
    height: 93px;
  }

  /* iMac */
  .imac {
    margin-top: -195px;
    margin-left: 105px;
    width: 201px;
    height: 122px;
    border-bottom: 29px solid #fff;
  }
  .imac:after {
    top: 151px;
    left: 69px;
    width: 43px;
    height: 18px;
    border-bottom: 14px solid #fff;
  }

  /* Note */
  .note {
    width: 23px;
    height: 16px;
    bottom: -31px;
    border-top: 3px solid #cac222;
    font-size: 9px;
  }

  /* Mouse */
  .mouse {
    width: 32px;
    height: 18px;
    top: -18px;
    left: 322px;
  }

  /* Black Screen */
  .bk-screen {
    width: 126px;
    height: 168px;
    right: 36px;
    top: -209px;
    border: 6px solid #525151;
  }
  .bk-screen:before {
    width: 54px;
    height: 11px;
    bottom: -17px;
    left: 39px;
  }
  .bk-screen:after {
    width: 54px;
    bottom: -28px;
    right: 19px;
    border-bottom: 11px solid #626262;
  }
  .bk-screen i {
    width: 80px;
    height: 7px;
    bottom: -35px;
    left: 27px;
  }

  /* Cup */
  .cup {
    top: -39px;
    left: 149px;
    width: 30px;
    height: 39px;
  }
  .cup i {
    height: 12px;
    left: 13px;
  }
  .cup i:before {
    width: 10px;
    height: 9px;
    top: 13px;
    left: -4px;
  }
  .cup i:after {
    width: 10px;
    height: 2px;
    top: 15px;
    left: -4px;
  }
  .cup:before {
    width: 9px;
    height: 18px;
    top: 6px;
    left: -13px;
    border: 4px solid #eb9673;
  }

  /* iPhone */
  .iphone {
    position: absolute;
    top: -50px;
    right: 30px;
    width: 31px;
    height: 50px;
  }
  .iphone:before {
    width: 23px;
    height: 35px;
    top: 5px;
    left: 4px;
  }
  .iphone:after {
    top: 43px;
    left: 13px;
  }

  /* Router */
  .router {
    width: 61px;
    height: 14px;
    top: -17px;
  }
  .router:before, .router:after {
    top: 14px;
    width: 12px;
  }
  .router ul li:first-child {
    width: 3px;
    height: 3px;
    top: 41px;
  }
  .router ul li:first-child:after, .router ul li:first-child:before, .router ul li:first-child i {
    width: 3px;
    height: 3px;
  }
  .router ul li:nth-child(2) {
    width: 5px;
    height: 5px;
    left: 45px;
    top: 39px;
  }

  /* Trash */
  .trash {
    width: 62px;
    bottom: 12px;
  }
  .trash:before {
    width: 65px;
    height: 100px;
  }
  .trash:after {
    width: 92px;
    height: 6px;
    top: 97px;
    left: -14px;
  }
  .trash .shadow {
    top: 17px;
  }
}
	</style>
</head>
<body>
	<div id="workspace">

		<div class="text">
			<h1><?= "Whoops..! Halaman yang anda cari tidak ditemukan !" ?></h1>
		</div>

	<!-- ===============================================/*
	/*                    Clock                         /*
	/* =============================================== -->			
	<div class="clock">
	  <div class="top"></div>
	  <div class="right"></div>
	  <div class="bottom"></div>
	  <div class="left"></div>
	  <div class="center"></div>
	  <div class="hour"></div>
	  <div class="minute"></div>
	  <div class="second"></div>
	</div>


	<!-- ===============================================/*
	/*                    Shelf                         /*
	/* =============================================== -->
	<div id="shelf">
		<ul>
			<!-- iPad -->
			<li class="ipad"></li>
			<!-- Books -->
			<li class="books">
				<span></span>
				<span><i></i></span>
				<span></span>
				<span></span>
				<span></span>
				<span></span>
				<span></span>
				<span></span>
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</li>
		</ul>
		<div></div>
	</div>
		

		<div class="desk">
			<!-- ===============================================/*
			/*                    Table                         /*
			/* =============================================== -->
			<div class="table">

				<div class="right-tb">
					<span></span>
					<span></span>
					<span></span>
				</div>
				
				<!-- ===============================================/*
				/*                    Mouse                         /*
				/* =============================================== -->
				<span class="mouse"></span>

				<!-- ===============================================/*
				/*                    Cup                           /*
				/* =============================================== -->
				<span class="cup"><i></i></span>
				
				<!-- ===============================================/*
				/*                    Router                        /*
				/* =============================================== -->
				<span class="router">
					<ul>
						<li><i></i></li>
						<li></li>
					</ul>
				</span>
				
				<!-- ===============================================/*
				/*                    iMac                          /*
				/* =============================================== -->
				<div class="imac">
					<!-- <img src="" alt=""> -->
					<!-- Note -->
					<span class="note">Yep!</span>
				</div>

				<!-- ===============================================/*
				/*                    Black Screen                  /*
				/* =============================================== -->
				<span class="bk-screen">
					<i></i>
				</span>

				<!-- ===============================================/*
				/*                      iPhone                      /*
				/* =============================================== -->
				<span class="iphone"></span>

			</div>
			
			<!-- ===============================================/*
			/*                      Chair                       /*
			/* =============================================== -->
			<div class="chair">
				<ul>
					<li></li>
					<li></li>
					<li></li>
				</ul>
				<i class="shadows"></i>
			</div>
			
			<!-- ===============================================/*
			/*                      Trash                       /*
			/* =============================================== -->
			<div class="trash"><i class="shadows"></i></div>
		
		</div>

</div>
<script>
	/* ================================================ /*
/*                                                  /* 
/*               Clock By  Martin Grand             /*
/*    https://codepen.io/martingrand/details/aAldc   /*
/*                                                  /*
/* ================================================ */
$('.houre, .minute, .second').data('plus-deg', 0)
calcTime();
$('#clock').addClass('aminate');
var int = setInterval(calcTime, 1000);
function calcTime () {
  var d = new Date();
  var h = d.getHours();
  rotate($('.houre'),  ((h > 12 ? h - 12 : h)*30)-90);
  rotate($('.minute'), (d.getMinutes()/*0-59*/*6)-90);
  rotate($('.second'), (d.getSeconds()/*0-59*/*6)-90);
}
function rotate ($object, deg) {
  var original_deg = deg;
  if(deg != $object.data('deg')){
    if(deg == -90) {
      $object.data('plus-deg', $object.data('plus-deg')+360);
    }
    deg += $object.data('plus-deg');
    $object.css({
      '-webkit-transform' : 'rotate('+deg+'deg)',
      '-moz-transform' : 'rotate('+deg+'deg)',  
      '-ms-transform' : 'rotate('+deg+'deg)',  
      '-o-transform' : 'rotate('+deg+'deg)',  
      'transform' : 'rotate('+deg+'deg)',  
      'zoom' : 1
    });
    $object.data('deg', original_deg);
  }
}
</script>


</body>
</html>