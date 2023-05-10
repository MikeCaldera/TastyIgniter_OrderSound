# TastyIgniter_OrderSound
UPDATED MAY 9th 2023
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

All sounds are working properly. I also added stock quote like flashing of incoming alert status. Honestly, it was very time consuming, and my logic took many many coffees and time. 
So much has changed along with mutiple files. Also updating using ajax callbacks and had the adjust the ajax 100 system side seconds down to 5 seconds. 
It really is a game changer as a former stock trader and developer this was a must. Cellphone, tablet, TV sets, it just works. I may eventually release this once I'm done with 2FA for logins. 

------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
Creates a wake up sound when an order comes in

Before we begin please do a backup.  

Who wants to stare at a screen all day so I created three different sounds during the order life cycle.
I have the first order sound working perfectly "Received - Step 1" which may be all you need. I need to find a better way on the other two sounds which need 
a timestamp of the original order to compare age. I was going to set another alert at 30 minutes if the order was in Pending - Step 2 or Preparation - Step 3.
I'd figured by that time bells should be going off that your behind and you need to get these orders out.
Then if Delivery - Step 4 has not been completed within 1 hour (You adjust this) another bell goes off.
it took some time so let me get this out before I forget my name.
Anyone is welcome to improve on this im sure it can be done.

Just follow the naming process exactly for this to work. You can change the order to whatever you like but this is how I did this.

In tastyIgniter webgui go to Admin/Sales/Statuses
create these exact names. copy and paste if you don't want errors.

1) Received - Step 1
2) Pending - Step 2
3) Preparation - Step 3
4) Delivery - Step 4
5) Completed - Step 5


How this works:
When a new order comes in it's labeled "Received - Step 1" which triggers this audio code. <audio id="order-received" src="/app/admin/views/orders/order_received.mp3"></audio>
This is very cool free sound. You can use any free sound but first just get this working then you can replace all. When the order is changed to "Pending - Step 2" the sound stops.
The goal is like an alarm clock. We know you hit snooze at least once.
Just make sure you allow Permissions to auto play sounds in your browser. By default they are mostly blocked so make sure you can play sounds automatically. Go inside your browser settings and allow sounds to autoplay.


These three mp3 files should be uploaded to this path:
	<audio id="order-received" src="/app/admin/views/orders/order_received.mp3"></audio>
	<audio id="order-delayed" src="/app/admin/views/orders/LateAlert.mp3"></audio>
	<audio id="order-wrong-price" src="/app/admin/views/orders/price_is_wrong.mp3"></audio>
  
  Virus scan these sounds first or just use any .mp3 you like but keep the same naming.
  
  <------------------------------------------------------------------------------------------------>
  paste the code inside /app/admin/views/orders/index.blade.php
  
  Again make sure index.blade.php is saved before changes.
  
  That's it. Oh by default I didn't want to wait 30 minutes or 60 minutes for the second and third sound alarm so I reduced it to (2 minutes and 5 minutes.) It's not working because I can't get the original time stamp field of the order.
  I'll find a way but maybe someone else can help with the timestamp. i need help with this alternative timestamp field not this ("list-col-name-order-time"). Its not totally complete for me but for some its just fine.
  
  Have fun and I hope that this helped someone.
  Mike
  
