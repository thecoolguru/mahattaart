
<div>
<table cellpadding="0" cellspacing="0" border="0" align="left" >
  <tr>
     
    <td width="820" valign="top">
    <div >
        <div style="font-size:20px"><b>Retrieve Your Saved Shopping Cart</b></div>
        <div ></div>
        <div style="color:#000000;">Simply enter your email address to access your saved cart.</div>
        <div ></div>
        <div >When you retrieve your cart, the items in it will be added to your current shopping cart. Your shopping cart is saved for 30 days.</div>
        <div ></div>
       
       <br /><br />
        <form action="<?=base_url()?>index.php/cart/retrieve_cart" method="post" name="retrieveEmailCart" id="retrieveEmailCart">
          
            <div class="floatLeft">Email Address</div><br />
            <input type="text" name="txtEmail" id="txtEmail" size="50" maxlength="128">
            <input type="submit" name="Submit" id="Submit" value="GET YOUR CART" >
        </form>
        <a  href="#">Return To Shopping Cart</a>
    </div>
  </td>
</tr>
</table>
</div>
