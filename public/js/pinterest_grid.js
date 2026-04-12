(function ($) {

    $.fn.pinterest_grid = function (options) {

        var settings = $.extend({
            padding_x: 10,
            padding_y: 10,
            no_columns: 3,
            margin_bottom: 50,
            single_column_breakpoint: 700
        }, options);

        var $container = this;
        var $items = $container.children();

        function calculate() {
            var container_width = $container.width();
            var column_width;

            if ($(window).width() < settings.single_column_breakpoint) {
                column_width = container_width;
                settings.no_columns = 1;
            } else {
                column_width = (container_width - settings.padding_x * settings.no_columns) / settings.no_columns;
            }

            var columns = [];
            for (var i = 0; i < settings.no_columns; i++) {
                columns[i] = 0;
            }

            $items.each(function () {
                var shortest_column = columns.indexOf(Math.min.apply(Math, columns));
                var left = (column_width + settings.padding_x) * shortest_column;
                var top = columns[shortest_column];

                $(this).css({
                    position: 'absolute',
                    left: left,
                    top: top,
                    width: column_width
                });

                columns[shortest_column] += $(this).outerHeight() + settings.padding_y;
            });

            $container.height(Math.max.apply(Math, columns) + settings.margin_bottom);
        }

        $(window).resize(calculate);
        calculate();

        return this;
    };

})(jQuery);
