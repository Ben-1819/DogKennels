<?php
use App\Models\Owner;
use App\Models\Dog;
?>
<div>
    <h1 class="title">Booking Confirmation Email</h1>

    <div>
        <?php
        $owner = Owner::find($booking->owner_id);
        ?>
        <p>Name of dogs owner: {{$owner->name}}</p>
        <?php
        $dog = Dog::find($booking->dog_id);
        ?>
        <p>Name of dog on booking: {{$dog->name}}</p>
        <p>Kennel dog will be staying in: {{$booking->kennel_id}}</p>
        <p>Booking start date: {{$booking->booking_start}}</p>
        <p>Booking end date: {{$booking->booking_end}}</p>
    </div>
</div>
