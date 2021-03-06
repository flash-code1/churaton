<section class="search-filter">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form action="rooms.php" method="POST" class="check-form">
                        <h4>Check Availability</h4>
                        <div class="datepicker">
                            <p>Check-In</p>
                            <input type="text" name="check_in" class="datepicker-1" value="dd / mm / yyyy">
                            <img src="design/x1/img/calendar.png" alt="">
                        </div>
                        <div class="datepicker">
                            <p>Check-out</p>
                            <input type="text" name="check_out" class="datepicker-2" value="dd / mm / yyyy">
                            <img src="design/x1/img/calendar.png" alt="">
                        </div>
                        <div class="room-quantity">
                            <div class="single-quantity">
                                <p>Adults</p>
                                <div class="pro-qty"><input name="adult" type="text" value="0"></div>
                            </div>
                            <div class="single-quantity">
                                <p>Children</p>
                                <div class="pro-qty"><input name="kids" type="text" value="0"></div>
                            </div>
                            <div class="single-quantity last">
                                <p>Rooms</p>
                                <div class="pro-qty"><input name="room" type="text" value="0"></div>
                            </div>
                        </div>
                        <div class="room-selector">
                            <p>Room</p>
                            <select class="suit-select" name="group">
                                <option value="0">Select All Room Type</option>
                                <option value="1">Master suite</option>
                                <option value="2">Double Room</option>
                                <option value="3">Single Room</option>
                                <option value="4">Special Room</option>
                            </select>
                        </div>
                        <button type="submit">Go</button>
                    </form>
                </div>
            </div>
        </div>
    </section>