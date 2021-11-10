<?php $__env->startPush('head-script'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/node_modules/dropify/dist/css/dropify.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/node_modules/switchery/dist/switchery.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form id="editSettings" class="ajax-form">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <div class="form-group">
                            <label for="company_name"><?php echo app('translator')->get('modules.accountSettings.companyName'); ?></label>
                            <input type="text" class="form-control" id="company_name" name="company_name"
                                   value="<?php echo e($global->company_name); ?>">
                        </div>
                        <div class="form-group">
                            <label for="company_email"><?php echo app('translator')->get('modules.accountSettings.companyEmail'); ?></label>
                            <input type="email" class="form-control" id="company_email" name="company_email"
                                   value="<?php echo e($global->company_email); ?>">
                        </div>
                        <div class="form-group">
                            <label for="company_phone"><?php echo app('translator')->get('modules.accountSettings.companyPhone'); ?></label>
                            <input type="tel" class="form-control" id="company_phone" name="company_phone"
                                   value="<?php echo e($global->company_phone); ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1"><?php echo app('translator')->get('modules.accountSettings.companyWebsite'); ?></label>
                            <input type="text" class="form-control" id="website" name="website"
                                   value="<?php echo e($global->website); ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1"><?php echo app('translator')->get('modules.accountSettings.companyLogo'); ?></label>
                             <div class="card">
                                    <div class="card-body">
                                        <input type="file" id="input-file-now" name="logo" class="dropify"
                                               <?php if(is_null($global->logo)): ?>
                                                   data-default-file="<?php echo e(asset('app-logo.png')); ?>"
                                               <?php else: ?>
                                                   data-default-file="<?php echo e(asset('user-uploads/app-logo/'.$global->logo)); ?>"
                                               <?php endif; ?>
                                        />
                                    </div>
                                </div>
                        </div>


                        <div class="form-group">
                            <label for="address"><?php echo app('translator')->get('modules.accountSettings.companyAddress'); ?></label>
                            <textarea class="form-control" id="address" rows="5"
                                      name="address"><?php echo e($global->address); ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="address"><?php echo app('translator')->get('modules.accountSettings.defaultTimezone'); ?></label>
                            <select name="timezone" id="timezone" class="form-control select2 custom-select">
                                <?php $__currentLoopData = $timezones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php if($global->timezone == $tz): ?> selected <?php endif; ?>><?php echo e($tz); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="address"><?php echo app('translator')->get('modules.accountSettings.changeLanguage'); ?></label>

                            <select class="form-control" name="locale">
                                <?php $__currentLoopData = $languageSettings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($language->language_code); ?>" <?php if($global->locale == $language->language_code): ?> selected <?php endif; ?>  data-content='<span class="flag-icon flag-icon-<?php echo e($language->language_code); ?>"></span> <?php echo e($language->language_name); ?>'><?php echo e($language->language_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="control-label"><?php echo app('translator')->get('modules.accountSettings.updateEnableDisable'); ?>
                                <a href="javascript:void(0)"><i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" data-original-title="<?php echo app('translator')->get('modules.accountSettings.updateEnableDisableTest'); ?>"></i></a>
                            </label>

                            <div class="col-sm-4">
                                <div class="switchery-demo">
                                    <input id="nexmo_status" name="system_update" type="checkbox"
                                           <?php if($global->system_update == 1): ?> checked
                                           <?php endif; ?> value="on" class="js-switch change-language-setting"
                                           data-color="#99d683" data-size="small"/>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            
                            <label for="address"><?php echo app('translator')->get('modules.accountSettings.getLocation'); ?></label>

                            <input type="text" class="form-control" id="gmap_geocoding_address">
                            <input type="hidden" id="latitude" name="latitude"
                                   value="<?php echo e($global->latitude); ?>">
                            <input type="hidden" id="longitude" name="longitude"
                                   value="<?php echo e($global->longitude); ?>">

                            <div id="gmap_geocoding" class="gmaps"></div>
                        </div>


                        <button type="button" id="save-form"
                                class="btn btn-success waves-effect waves-light m-r-10">
                            <?php echo app('translator')->get('app.save'); ?>
                        </button>
                        <button type="reset"
                                class="btn btn-inverse waves-effect waves-light"><?php echo app('translator')->get('app.reset'); ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>
    <script src="<?php echo e(asset('assets/node_modules/select2/dist/js/select2.full.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/node_modules/bootstrap-select/bootstrap-select.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/node_modules/dropify/dist/js/dropify.min.js')); ?>" type="text/javascript"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDw9cQQsGxYkPicGbigZG1koUGRC4TAbSs&libraries=places"></script>
    <script src="<?php echo e(asset('assets/node_modules/switchery/dist/switchery.min.js')); ?>"></script>
    <script>
        $('[data-toggle="tooltip"]').tooltip()
        // Switchery
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        $('.js-switch').each(function () {
            new Switchery($(this)[0], $(this).data());

        });
        // For select 2
        $(".select2").select2();

        $('.dropify').dropify({
            messages: {
                default: '<?php echo app('translator')->get("app.dragDrop"); ?>',
                replace: '<?php echo app('translator')->get("app.dragDropReplace"); ?>',
                remove: '<?php echo app('translator')->get("app.remove"); ?>',
                error: '<?php echo app('translator')->get('app.largeFile'); ?>'
            }
        });

        $(document).ready(function () {
            $("#getLoaction").click(function () {
                $('body').block({
                    message: '<p style="margin:0;padding:8px;font-size:24px;">Just a moment...</p>'
                    , css: {
                        color: '#fff'
                        , border: '1px solid #fb9678'
                        , backgroundColor: '#fb9678'
                    }
                });

                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition);
                } else {
                    alert("Geolocation is not supported by this browser.");
                    $("#locationMsg").html('');
                }
            });
        });


        function showPosition(position) {
            $('#latitude').val(position.coords.latitude);
            $('#longitude').val(position.coords.longitude);
            initialize();
            $('body').unblock();
        }

        $('#save-form').click(function () {
            $.easyAjax({
                url: '<?php echo e(route('admin.settings.update', ['1'])); ?>',
                container: '#editSettings',
                type: "POST",
                redirect: true,
                file: true
            })
        });
    </script>

    <script>
        //Get Latitude And Longitude
        var geocoder = new google.maps.Geocoder();

        function geocodePosition(pos) {
            geocoder.geocode(
                {
                    latLng: pos
                }, function (responses) {
                    if (responses && responses.length > 0) {
                        updateMarkerAddress(responses[0].formatted_address);
                    } else {
                        updateMarkerAddress('Cannot determine address at this location.');
                    }
                });
        }

        function updateMarkerStatus(str) {
            //document.getElementById('markerStatus').innerHTML = str;
        }

        function updateMarkerPosition(latLng) {
            $('#latitude').val(latLng.lat());
            $('#longitude').val(latLng.lng());
        }

        function updateMarkerAddress(str) {

            //  $('#currentlocation').val(str);

        }

        function initialize() {
            //Latitude longitude of default

            var clat = $('#latitude').val();
            var clong = $('#longitude').val();

            clat = parseFloat(clat);
            clong = parseFloat(clong);

            var latLng = new google.maps.LatLng(clat, clong);

            var mapOptions = {
                center: latLng,
                zoom: 16,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            map = new google.maps.Map(document.getElementById('gmap_geocoding'),
                mapOptions);

            var input = document.getElementById('gmap_geocoding_address');

            var autocomplete = new google.maps.places.Autocomplete(input);

            //autocomplete.bindTo('bounds', map);

            var infowindow = new google.maps.InfoWindow();
            marker = new google.maps.Marker({
                map: map,
                position: latLng,
                title: 'ReferSell',
                map: map,
                draggable: true
            });
            updateMarkerPosition(latLng);
            geocodePosition(latLng);

            // Add dragging event listeners.
            google.maps.event.addListener(marker, 'dragstart', function () {
                updateMarkerAddress('Dragging...');
            });

            google.maps.event.addListener(marker, 'drag', function () {
                updateMarkerStatus('Dragging...');
                updateMarkerPosition(marker.getPosition());
            });

            google.maps.event.addListener(marker, 'dragend', function () {

                updateMarkerStatus('Drag ended');
                geocodePosition(marker.getPosition());
            });
            google.maps.event.addListener(autocomplete, 'place_changed', function () {
                infowindow.close();
                var place = autocomplete.getPlace();

                if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                } else {
                    map.setCenter(place.geometry.location);
                    map.setZoom(10);  // Why 17? Because it looks good.
                }

                /* var image = new google.maps.MarkerImage(
                 place.icon,
                 new google.maps.Size(71, 71),
                 new google.maps.Point(0, 0),
                 new google.maps.Point(17, 34),
                 new google.maps.Size(35, 35));
                 marker.setIcon(image);*/
                marker.setPosition(place.geometry.location);
                updateMarkerPosition(place.geometry.location);

                var address = '';

            });

            // Sets a listener on a radio button to change the filter type on Places
            // Autocomplete.
            function setupClickListener(id, types) {
                var radioButton = document.getElementById(id);
                google.maps.event.addDomListener(radioButton, 'click', function () {
                    autocomplete.setTypes(types);
                });
            }

        }

        $('#gmap_geocoding_address').keydown(function (event) {
            if (event.keyCode == 13) {
                event.preventDefault();
                return false;
            }
        });


        <?php if(!is_null($global->latitude)): ?>
        initialize();
        <?php endif; ?>

    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\kuliah\Belajar\web\laravel\SiRekrutV1\resources\views/admin/settings/index.blade.php ENDPATH**/ ?>