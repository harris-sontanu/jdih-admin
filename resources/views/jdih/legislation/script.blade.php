<script>
    $(function() {

        $('.select-search').select2();

        $('.select').select2({
            minimumResultsForSearch: Infinity
        });

        $(".filter-form").submit(function() {
            $(this).find(":input").filter(function(){ return !this.value; }).attr("disabled", "disabled");
            return true;
        });

        $(document).on('click', '.copy-link', function(){
            let url = $(this).data('url');
            navigator.clipboard.writeText(url);

            confirm('URL telah berhasil disalin');
        })

        const value = document.querySelector("#value")
        const input = document.querySelector("#year")
        value.textContent = input.value
        input.addEventListener("input", (event) => {
            value.textContent = event.target.value
        })

        $('.options-hide-toggle').click(function() {
            let target = $(this).data('target');
            let el = $(this);
            $('#' + target).slideToggle('fast', function(){
                if (el.html() == 'Lihat semua') {
                    el.html('Lihat lebih sedikit');
                } else {
                    el.html('Lihat semua');
                }
            });
        })

        $('.daterange-datemenu').daterangepicker({
            showDropdowns: true,
            applyButtonClasses: "btn-danger",
            locale: {
                format: 'DD/MM/YYYY',
                applyLabel: "Ok",
                cancelLabel: "Batal",
                fromLabel: "Dari",
                toLabel: "Ke",
                daysOfWeek: [
                    "Mg",
                    "Sn",
                    "Sl",
                    "Rb",
                    "Km",
                    "Jm",
                    "Sb"
                ],
                monthNames: [
                    "Januari",
                    "Februari",
                    "Maret",
                    "April",
                    "Mei",
                    "Juni",
                    "Juli",
                    "Agustus",
                    "September",
                    "Oktober",
                    "November",
                    "Desember"
                ],
            }
        });
    });
</script>
