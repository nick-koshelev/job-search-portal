<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_xEvldVOqjGVS7oiMctpEFQjJBJ9cx9E&libraries=places"></script>
<div class="container shadow pb-2 h-100 flex-grow-1">
    <div class="p-5">
        <p class="h1 mb-4">Create company</p>
        <div class="pt-2">
            <form class="ms-2" action="/company/create" method="post">
                <div class="mb-3 row">
                    <label for="name" class="col-sm-2 col-form-label">Name <span class="text-danger">*</span></label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-3">
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="industry" class="col-sm-2 col-form-label">Industry</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="industry" name="industry">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="location" class="col-sm-2 col-form-label">Location</label>
                    <div class="col-sm-3 d-flex">
                        <input type="text" class="form-control" id="location" name="location">
                        <i class="fas fa-map-marker-alt pt-2 ms-2" id="locationIcon"></i>
                    </div>
                    <div class="position-relative col-5 w-100">
                        <div class="position-absolute w-100" id="mapContainer"
                             style="display: none; z-index: 1;">
                            <div id="map" style="height: 400px;"></div>
                        </div>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="website" class="col-sm-2 col-form-label">Website</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="website" name="website">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-3">
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="phone" name="phone">
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-sm-3 offset-sm-2">
                        <div class="float-end">
                            <a href="/user" class="btn btn-danger ms-2">Cancel</a>
                            <button type="submit" class="btn btn-dark ms-2">Create</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="/app/views/company/location.js"></script>