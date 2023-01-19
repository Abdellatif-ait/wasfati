<?php
    header('Content-type: text/css; charset: UTF-8');
    require_once __DIR__.'/../admin/Models/params.php';
    $paramsModel=new paramsModel();
    $params=$paramsModel->getParams();
    foreach($params as $param){
        $GLOBALS[$param['cle']]=$param['valeur'];
    }
?>

:root {
    --primary1: <?php echo $GLOBALS['primary1']; ?>;
    --primary2: <?php echo $GLOBALS['primary2']; ?>;
    --secondary1: <?php echo $GLOBALS['secondary1']; ?>;
    --secondary2: <?php echo $GLOBALS['secondary2']; ?>;
    --bgRGB: <?php echo $GLOBALS['bgRGB']; ?>;
    --black: <?php echo $GLOBALS['black']; ?>;
    --body:  <?php echo $GLOBALS['body']; ?>;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Roboto', sans-serif;
    -webkit-user-drag: none;
}
body{
    background-color: rgb(var(--body));
}
a, a:visited {
    text-decoration: none;
    color: rgb(var(--black));
}

nav {
    padding: 16px 32px;
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: rgba(var(--black),0.15) 1px solid;
}


.call-action {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 24px;
}
.call-action img{
    size: 8px;
}

.menu {
    display: flex;
    justify-content: space-between;
    align-items: center;
    list-style: none;
    gap: 24px;
    margin: 0;
    padding: 0;
}

.menu li{
    font-family: 'Raleway';
    font-style: normal;
    font-weight: 700;
    cursor: pointer;
}


menu a:active, .menu a:hover, .menu a:focus {
    color: var(--primary1);
}
.sub-menu {
    display: none;
    list-style: none;
}
.menu li:hover .sub-menu {
    display: flex;
    flex-direction: column;
    gap: 8px;
    position: absolute;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    padding: 8px 16px;
    z-index: 1;
}

.prm-btn {
    color: var(--secondary2);
    padding: 8px 16px;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 500;
    cursor: pointer;
    background: linear-gradient(90deg, #DD5353 0%, #B73E3E 100%);
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    border: none;
}

.prm-btn:hover {
    background-color: var(--primary1);
    color: #fff;
}
footer{
    padding: 16px 32px;
    width: 100%;
    display: flex;
    justify-content: space-between;
    gap: 32px;
    background-color: rgba(var(--bgRGB),0.5);
    color: rgba(var(--black), 0.75);
    
}

footer>div:first-child{
    flex: 2;
}
footer>div:first-child p{
    width: 50%;
    font-family: 'Roboto';
}
footer>div:last-child{
    flex: 1;
}
footer>div{
    flex: 2;
}
.footer-menu{
    display: flex;
    align-items: center;
    gap: 96px;
}

.footer-menu ul{
    display: block;
    align-items: center;
    list-style: none;
    margin: 0;
    padding: 0;
}

.footer-menu li{
    padding: 12px 0;
}

.footer-menu li:hover a{
    color: var(--primary1);
}
.footer-menu a{
    font-family: 'Roboto';

    font-weight: 500;
    color: rgba(var(--black), 0.75);
}

.H6{
    font-family: 'Raleway';
    font-weight: bold;
    font-size: 16px;
    color: rgb(var(--black));
    padding: 0 0 24 0;
}

.linkedin{
    transform : scale(1.12)
}

.footer-social-media a{
    display: flex;
    font-family: 'Roboto';
    align-items: center;
    gap: 8px;
    font-weight: 500;
    color: rgb(var(--black));
}

.footer-social-media a:hover{
    color: var(--primary1);
}

.footer-social-media{
    display: flex;
    flex-direction: column;
    gap: 16px;
    opacity: 0.75;
}

.footer-logo{
    transform: scale(1.16);
    padding-bottom: 24px;
}

.card-container{
    display: flex;
    flex-direction: column;
    gap: 16px;
    padding: 8px 16px;
    border-radius: 8px;
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    background-color: var(--secondary2);
    width: 250px;
    min-height: 350px;
}

.card-img{
    height: 175px;
    object-fit: cover;
    border-radius: 8px;
}

.card-body{
    height: fit-content;
    display: flex;
    flex-direction: column;
    gap:4px;
}

.card-header{
    font-family: 'Raleway';
    display: inline-block;
    text-overflow: ellipsis;
    font-weight: bold;
    font-size: 16px;
    color: rgb(var(--black));
}

.card-content{
    font-family: 'Roboto';
    font-weight: 500;
    font-size: 14px;
    color: rgba(var(--black), 0.75);
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 4;  /* limit to 2 lines */
}

.card-container:hover{
    box-shadow: 0px 8px 8px rgba(0, 0, 0, 0.25);
    background-color: rgba(var(--bgRGB),0.5);
}
.card-container>.prm-btn{
    align-self: flex-end;
    transform : scale(0.8)
}

.carousel-item{
    transition: transform 4s ease, opacity .5s ease-out
}

.swiper-item{
    padding: 48px 96px;
    width: 100%;
    position: relative;
}
.swiper-item-img{
    width: 100%;
    height: 400px;
    object-fit: cover;
    border-radius: 8px;
}
.swiper-item-body{
    position: absolute;
    top: 48;
    left: 96;
    display: flex;
    flex-direction: column;
    justify-content: center;
    gap: 48px;
    padding: 48px 96px;
    width: 40%;
    height: 400px;
    background-color: rgba(255,255,255, 0.5);
}

.swiper-item-text{
    display:flex;
    flex-direction: column;
    gap:24px;
}

.swiper-item-text h3{
    font-family: 'Raleway';
    font-weight: bold;
    font-size: 36px;
    color: rgb(var(--black));
}

.swiper-item-text p{
    font-family: 'Roboto';
    font-weight: 500;
    font-size: 16px;
    color: rgba(var(--black), 0.75);
}

.swiper-item .prm-btn{
    align-self: flex-start;
    transform : scale(0.9);
    color: var(--secondary2);
}

.carousel{
    background-color: rgba(var(--bgRGB),0.5);
    margin: 48px 0;
}

.categories{
    display: flex;
    flex-direction: column;
    gap: 32px;
    padding: 8px 16px;
    margin: 48px 16px;
    border-radius: 8px;
}

.category{
    display: flex;
    flex-direction: column;
    gap: 16px;
    width: 100%;
}

.category-header{
    font-family: 'Raleway';
    font-weight: bold;
    font-size: 16px;
    color: rgb(var(--black));
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.category-header a{
    font-family: 'Roboto';
    font-weight: 500;
    font-size: 14px;
    color: rgba(var(--black), 0.75);
    
}

.category-header a:hover{
    color: var(--primary1);
}

.category-body{
    width: 100%;
    overflow-x: scroll;
}

.list-view{
    display: flex;
    flex-direction: row;
    padding: 8px 16px;
    gap: 48px;
    width: fit-content;
}

.category-body::-webkit-scrollbar{
    display: none;
}

.header{
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 16px 32px;
    text-align: center;
    color: rgb(var(--black));
    font-weight: 600;
}
.header>li{
    margin: 0;
    font-family: 'Roboto';
}

.header-container{
    width: 100%;
}
.horizontale-container,.verticale-container{
    display: flex;
    justify-content: space-between;
    gap: 16px;
    padding: 16px 32px;
    
}
.horizontale-container>img{
    height: 480px;
    object-fit: cover;
    border-radius: 8px;
}
.verticale-container{
    flex-direction: column;
    color: rgb(var(--black));
    font-family: 'Roboto';
}
.verticale-container>.horizontale-container{
    flex-direction: row;
    width: 75%;
    gap: 16px;
    padding: 0;
}
.verticale-container .H6{
    padding: 0;
}
.verticale-container video{
    height: 480px;
    margin: auto;
}
.rate-container{
    margin: auto;
    width: fit-content;
}
.rate {
    float: left;
    height: 46px;
    padding: 0 10px;
}
.rate:not(:checked) > input {
    display: none;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: rgb(var(--black));    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: rgba(var(--black), 0.75);  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: rgb(var(--black));
}
.list-grid{
    display: grid;
    grid-template-columns: repeat(auto-fit, 250px);
    justify-content: center;
    place-items: center;
    column-gap: 48px;
    row-gap: 24px;
    padding: 8px 16px;
}
.profile-header{
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    gap: 96px;
    padding: 16px 32px;
}
.profile-header>img{
    width: 320px;
    height: 320px;
    object-fit: cover;
    border-radius: 50%;
}
.profile-header>.horizontale-container>input{
    width: fit-content;
    height: fit-content;
    padding: 8px 16px;
    background-color: white;
    border: 0;
}
.H4{
    font-family: 'Raleway';
    font-weight: bold;
    font-size: 24px;
    color: rgb(var(--black));
}
.profile-header>.horizontale-container{
    gap: 32px;
}
.secondary-btn{
    background-color: white;
    border: 0;
    padding: 4px 8px;
    font-family: 'Roboto';
    font-weight: 500;
    font-size: 16px;
    color: rgba(var(--black), 0.75);
    border: 1px solid rgba(var(--black), 0.75);
    border-radius: 8px;
}
.secondary-btn:hover{
    background-color: rgba(var(--black), 0.75);
    color: white;
}
.list-header{
    margin: 8px 16px;
    padding: 8px 16px;
}
.search{
    width: 35%;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
    padding: 4px 8px;
    background-color: rgba(var(--black), 0.1);
    border-radius: 8px;
}
.search>input{
    width: 75%;
    padding: 8px 16px;
    border: 0;
    border-radius: 8px;
    font-family: 'Roboto';
    font-weight: 500;
    font-size: 16px;
    color: rgba(var(--black), 0.75);
    background-color: unset;
}
.search-container{
    display: flex;
    flex-direction: row;
    align-items: center;
    gap: 16px;
    padding: 8px 16px;
}
#filter-btn{
    display: flex;
    width: fit-content;
    border: 0;
    border-radius: 8px;
    background-color: white;
    align-items: center;
    font-family: 'Roboto';
    font-weight: 500;
    font-size: 16px;
    color: rgba(var(--black), 0.75);
    padding: 2px 4px;
}
.search img{
    transform: scale(0.8);
}

.filter-container{
    background-color: rgba(var(--black), 0.1);
    padding: 8px 16px;
    border-radius: 8px;
    display: none;

}
.filter{
    display: grid;
    grid-template-columns: repeat(auto-fit, 240px);
    align-items: flex-start;
    justify-content: center;
    gap: 16px;
}

.list-filter{
    display: flex;
    flex-direction: column;
    gap: 16px;
    padding: 8px 16px;
}


.Form{
    width: 45%;
}
.Form .horizontale-container,.Form .verticale-container{
    padding: 8px 16px;
}
.Form label,.Form input{
    display:block;
    padding: 8px 16px;
}
.Form input{
    border: 1px rgba(var(--black),0.15) solid;
    border-radius: 8px;
}
.Form label{
    font-family: 'Raleway';
    font-weight: bold;
    font-size: 16px;
    color: rgb(var(--black));
}

.register,.login{
    display: none;
    padding: 16px 32px;
    background-color: rgba(var(--bgRGB),0.5);
    border-radius: 8px;
}


.register>h3 ,.login>h3{
    font-family: 'Raleway';
    font-weight: bold;
    font-size: 32px;
    color: rgb(var(--black));
    text-align: center;
}
.Form .prm-btn{
    margin: auto;
}
.Form p{
    text-align: center;
}
.Form p>span{
    color: var(--primary1);
    font-family: 'Roboto';
    font-weight: 600;
    font-size: 16px;
    cursor: pointer;
}
.auth-logo{
    width: 45%;
    height: 480px;
    object-fit: cover;
}
.nav-logo{
    width: 48px;
    height: 48px;
}
.footer-logo{
    width: 160px;
    height: 160px;
}
.auth-logo{
    width: 45%;
}

.not-found{
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 16px;
    padding: 16px 32px;
    font-family: 'Roboto';
}
.contact-body{
    display: flex;
    width: 35%;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    border-radius: 8px;
    gap: 16px;
    padding: 16px 32px;
    font-family: 'Roboto';
    background-color: rgba(var(--bgRGB),0.5);
}
.contact-body .prm-btn{
    margin: auto;
}

.popout{
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(var(--bgRGB),0.5);
    z-index: 100;
    overflow: auto;
    padding: 16px 32px;
}
.popout .popout-container{
    background-color: white;
    margin: auto;
    padding: 16px 32px;
    border-radius: 8px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 16px;
    font-family: 'Roboto';
    width: 40%;
}
.popout .popout-container .prm-btn{
    margin: auto;
}
.popout .popout-container .secondary-btn{
    margin: auto;
}
.popout .h6{
    padding: 0;
}
.active{
    display: block;
}