
<div id="search_container_2">
    <div id="search_2">
        <ul class="nav nav-tabs">
            <li><a href="#tours" data-bs-toggle="tab" class="active show" id="tab_bt_1"><span>Tours</span></a>
            </li>
            <li><a href="#hotels" data-bs-toggle="tab" id="tab_bt_2"><span>Hotels</a></li>
            <li><a href="#restaurants" data-bs-toggle="tab" id="tab_bt_3"><span>Restaurants</span></a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade active show" id="tours">
                <form>
                    <div class="row g-0 custom-search-input-2">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Where..." id="autocomplete">
                                <i class="icon_pin_alt"></i>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <input class="form-control date-pick" type="text" name="dates"
                                    placeholder="When..">
                                <i class="icon_calendar"></i>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="panel-dropdown">
                                <a href="#">Guests <span class="qtyTotal tours">1</span></a>
                                <div class="panel-dropdown-content">
                                    <!-- Quantity Buttons -->
                                    <div class="qtyButtons tours">
                                        <label>Adults</label>
                                        <input type="text" name="qtyInput_tours" value="1">
                                    </div>
                                    <div class="qtyButtons tours">
                                        <label>Childrens</label>
                                        <input type="text" name="qtyInput_tours" value="0">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <input type="submit" class="btn_search" value="Search">
                        </div>
                    </div>
                    <!-- /row -->
                </form>
            </div>
            <!-- End tab -->
            <div class="tab-pane fade" id="hotels">
                <form>
                    <div class="row g-0 custom-search-input-2">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Hotel Name, City...">
                                <i class="icon_pin_alt"></i>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <input class="form-control date-pick" type="text" name="dates"
                                    placeholder="When..">
                                <i class="icon_calendar"></i>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="panel-dropdown">
                                <a href="#">Guests <span class="qtyTotal hotels">1</span></a>
                                <div class="panel-dropdown-content">
                                    <!-- Quantity Buttons -->
                                    <div class="qtyButtons hotels">
                                        <label>Adults</label>
                                        <input type="text" name="qtyInput_hotels" value="1">
                                    </div>
                                    <div class="qtyButtons hotels">
                                        <label>Childrens</label>
                                        <input type="text" name="qtyInput_hotels" value="0">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <input type="submit" class="btn_search" value="Search">
                        </div>
                    </div>
                    <!-- /row -->
                </form>
            </div>
            <!-- End tab -->
            <div class="tab-pane" id="restaurants">
                <form>
                    <div class="row g-0 custom-search-input-2">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <input class="form-control" type="text"
                                    placeholder="Restaurant Name, City...">
                                <i class="icon_pin_alt"></i>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <input class="form-control date-pick" type="text" name="dates"
                                    placeholder="When..">
                                <i class="icon_calendar"></i>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="panel-dropdown">
                                <a href="#">Guests <span class="qtyTotal restaurants">1</span></a>
                                <div class="panel-dropdown-content">
                                    <!-- Quantity Buttons -->
                                    <div class="qtyButtons restaurants">
                                        <label>Adults</label>
                                        <input type="text" name="qtyInput_restaurants" value="1">
                                    </div>
                                    <div class="qtyButtons restaurants">
                                        <label>Childrens</label>
                                        <input type="text" name="qtyInput_restaurants" value="0">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <input type="submit" class="btn_search" value="Search">
                        </div>
                    </div>
                    <!-- /row -->
                </form>
            </div>
            <!-- End tab -->
        </div>
    </div>
    <!-- End search_container_2 -->
</div>