<!-- test css -->
<ul id="dropdown-menu-freebie">
    <li>
        <ul class="dropdown-menu">
          <li><a href="#">Dropdown <img src="http://ui-cloud.com/res/pixelsdaily/Drop-Down-Menu/demo/images/arrow.png"/></a>
            <ul>
              <li><a href="#">Item 1</a></li>
              <li><a href="#">Item 2</a></li>
              <li><a href="#">Item 3</a></li>
            </ul>
          </li>
        </ul>
    </li>
  </ul>

  <style type="text/css">

h4 { color: #c5c5c5; margin-top: 50px; }
    body { margin: 0; font-family: Arial; }
    ul#dropdown-menu-freebie { display: table; list-style: none; margin: 0 auto; padding: 0; }
    ul#dropdown-menu-freebie > li { float: left; margin-right: 20px; margin-bottom: 20px; }
    ul#dropdown-menu-freebie > li:last-child { margin-right: 0; }
ul.dropdown-menu li ul
{
  display: none;
  list-style: none;
  text-align: left;
}

ul.dropdown-menu li:hover ul
{
  display: table;
  margin: 0 auto;
  background-color: #e9e9e9;

  -moz-box-shadow: 0 0 6px 1px rgba(0, 0, 0, 0.5);
  -webkit-box-shadow: 0 0 6px 1px rgba(0, 0, 0, 0.5);
  box-shadow: 0 0 6px 1px rgba(0, 0, 0, 0.5);
}

ul.dropdown-menu
{
  padding: 0 20px;
  border-radius: 10px;
  list-style: none;
  position: relative;
  display: table;
  padding: 0;
  margin: 0;
}

ul.dropdown-menu::after
{
  content: "";
  display: table;
  margin: 0 auto;
}

ul.dropdown-menu ul > li:hover
{
  background: #4b545f;
  background: linear-gradient(top, #4f5964 0%, #5f6975 40%);
  background: -moz-linear-gradient(top, #4f5964 0%, #5f6975 40%);
  background: -webkit-linear-gradient(top, #4f5964 0%,#5f6975 40%);
}

ul.dropdown-menu li:hover a
{
  color: #676767;
}

ul.dropdown-menu li a
{
  display: block;
  color: #757575;
  text-decoration: none;
}

ul.dropdown-menu > li
{
  border-radius: 8px;
}

ul.dropdown-menu > li > a
{ 
  color: #4a4949;
  background-color: #c5c5c5;
  border: 1px solid rgba(0, 0, 0, 0.2);
  border-radius: 8px;
  position: relative;
  padding: 10px 15px;
  width: 140px;
  z-index: 5;
  font-size: 14px;

  -moz-box-shadow: 0 4px 10px -3px #000;
  -webkit-box-shadow: 0 4px 10px -3px #000;
  box-shadow: 0 4px 10px -3px #000;
}

ul.dropdown-menu > li > a:hover
{
  background-color: #dc4d30;
  color: #FFF;
}

ul.dropdown-menu > li > a > img
{
  float: right;
  border: none;
}

ul.dropdown-menu ul
{
  border-radius: 0px;
  padding: 0;
}

ul.dropdown-menu ul li
{
  float: none; 
  position: relative;
  border-bottom: 1px solid transparent;
}

ul.dropdown-menu ul li a
{
  font-size: 13px;
  padding: 10px;
  color: #676767;
  width: 120px;
}

ul.dropdown-menu ul li:hover
{
  background: #cecece;
  border-bottom: 1px solid #fff;
  -moz-box-shadow: inset 0 7px 9px -8px #000;
  -webkit-box-shadow: inset 0 7px 9px -8px #000;
  box-shadow: inset 0 7px 9px -8px #000;
}

ul.dropdown-menu ul li:last-child:hover
{
  border-bottom: none;
}
  </style>