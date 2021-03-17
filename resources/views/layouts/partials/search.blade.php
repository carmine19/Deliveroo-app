<div class="container" style="margin-top: 50px;">
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <h4 class="text-center">Search</h4>
            <hr>
            <div class="form-group">
                <input type="text" name="name" id="name" placeholder="" class="form-control">
            </div>
            <div id="country_list"></div>
        </div>
        <div class="col-lg-3"></div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function () {

        $('#name').on('keyup', function () {
            var query = $(this).val();
            $.ajax({

                url: "{{ route('search') }}",

                type: "GET",

                data: {'name': query},

                success: function (data) {

                    $('#country_list').html(data);
                }
            })
            // end of ajax call
        });


        $(document).on('click', 'li', function () {

            var value = $(this).text();
            $('#country').val(value);
            $('#country_list').html("");
        });
    });
</script>
