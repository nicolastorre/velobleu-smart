
(function($) {

    /**
     * AppController
     *
     * @constructor
     */
    var AppController = function() {
      this.init();
    };

    /**
     *
     * @type {{init: init, event: event, initSpinner: initSpinner}}
     */
    AppController.prototype = {

        /**
         * Init AppController
         */
        init: function() {
            this.$el = $('#app');

            this.model = new VelobleuModel();
            this.view = new AppView();
            this.spinner = this.initSpinner();

            this.event();

            this.model.getAllStation();

        },

        /**
         * Events
         */
        event: function() {
            var that = this;

            /**
             * Get all velobleu station
             */
            this.$el.on('velobleu_station_all', function() {
               that.view.mapView(that.model.stationList);
            });

            /**
             * start the spinner
             */
            this.$el.on("start_spinner", function() {
                that.spinner.spin(document.getElementById('app'));
            });

            /**
             * stop the spinner
             */
            this.$el.on("stop_spinner", function() {
                that.spinner.stop();
            });
        },

        /**
         * Init spinner
         */
        initSpinner: function() {
            var opts = {
                lines: 9 // The number of lines to draw
                , length: 20 // The length of each line
                , width: 8 // The line thickness
                , radius: 20 // The radius of the inner circle
                , scale: 1 // Scales overall size of the spinner
                , corners: 1 // Corner roundness (0..1)
                , color: '#000' // #rgb or #rrggbb or array of colors
                , opacity: 0.25 // Opacity of the lines
                , rotate: 0 // The rotation offset
                , direction: 1 // 1: clockwise, -1: counterclockwise
                , speed: 1 // Rounds per second
                , trail: 60 // Afterglow percentage
                , fps: 20 // Frames per second when using setTimeout() as a fallback for CSS
                , zIndex: 2e9 // The z-index (defaults to 2000000000)
                , className: 'spinner' // The CSS class to assign to the spinner
                , top: '50%' // Top position relative to parent
                , left: '50%' // Left position relative to parent
                , shadow: false // Whether to render a shadow
                , hwaccel: false // Whether to use hardware acceleration
                , position: 'absolute' // Element positioning
            };

            return new Spinner(opts);
        },
    };

    /**
     * VeloBleuModel
     *
     * @constructor
     */
    var VelobleuModel = function() {
        this.init();
    };

    /**
     *
     * @type {{init: init, getAllStation: getAllStation}}
     */
    VelobleuModel.prototype = {

        /**
         * Init VeloBleuModel
         */
        init: function() {

            this.$el = $("#app");

            this.stationList = null;
            this.ajaxSent = false;
            this.apiURL = "api/velobleu/station";
        },

        /**
         * Get all velo bleu station data
         */
        getAllStation: function() {
            var that = this;

            if(!this.ajaxSent) {
                this.ajaxSent = true;
                that.$el.trigger('start_spinner');

                $.ajax({
                    url: that.apiURL,
                    type: "GET",
                    success: function(data) {

                        that.stationList = data.stand;
                        that.$el.trigger('velobleu_station_all');
                        that.$el.trigger('stop_spinner');
                    },
                    error: function(xhr, ajaxOptions, thrownError) {

                        that.$el.trigger('stop_spinner');
                        alert('Erreur API!');
                    }
                });
            }
        }
    };

    /**
     * AppView
     *
     * @constructor
     */
    var AppView = function() { this.init(); };

    /**
     *
     * @type {{init: init, displayView: displayView}}
     */
    AppView.prototype = {

        /**
         * Init AppView
         */
        init: function() {

            this.map = null;
            this.markerList = null;
            this.infowindow = null;
        },

        /**
         * Compile and display Handlebars template
         *
         * @param $el
         * @param $entrytemplate
         * @param data
         */
        displayView: function($el, $entrytemplate, data) {

            var source   = $entrytemplate.html();
            var template = Handlebars.compile(source);
            var html    = template(data);
            $el.append(html);
        },

        /**
         * Format txt with encodeURIComponent and more ...
         *
         * @param txt
         * @returns {string}
         */
        formatTxtUri: function(txt) {

            if(txt === null) {
                return "";
            } else {
                return decodeURIComponent(txt.replace(/\+/g, ' '));
            }
        },

        /**
         * Display the Google Map
         *
         * @param stationList
         */
        mapView: function(stationList) {
            var that = this;
            var mLatlng;
            var marker;

            that.markerList = [];

            var center = {lat: 43.700000, lng: 7.250000};

            var mapOptions = {
                zoom: 14,
                center: center
            };

            that.map = new google.maps.Map(document.getElementById('velobleu-map'), mapOptions);
            that.infowindow = new google.maps.InfoWindow();

            $.each(stationList, function (index, value) {
                if(value.lat !== "0" && value.lng !== "0") {
                    mLatlng = new google.maps.LatLng(value.lat, value.lng);

                    marker = new google.maps.Marker({
                        position: mLatlng,
                        title: value.name,
                        map: that.map
                    });

                    that.markerList[value.id] = marker;

                    google.maps.event.addListener(that.markerList[value.id], 'click', function (e) {
                        that.infowindow.setContent("<h5>" + that.formatTxtUri(value.name) + " - " + that.formatTxtUri(value.wcom) + "</h5>"+ (value.disp === "1" ? "<p>station disponible</p>" : "<p>station indispoonible</p>" ) + (value.neutral === "1" ? "<p>station neutralisé</p>" : "" ) +"<ul><li>Vélos disponibles : " + value.ab + "</li><li>Places libres disponibles : " + value.ap + "</li><li>Capacité total : " + value.tc + "</li><li>Capacité disponible : " + value.ac + "</li></ul>");
                        that.infowindow.open(that.map, this);
                    });
                }
            });
        }
    };

    $(document).ready(function() {
        // Lance le widget
        window.velobleuMap =  new AppController();
    });

})(jQuery);