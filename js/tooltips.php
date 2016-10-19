<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function() {
        var tooltips = $("[title]").tooltip({
            position: {
                my: "left top",
                at: "right+15 top-5",
                collision: "none",
            }
        });

    });
</script>

<?php
  const TIP_PASSWORD = 'La debe tener un minimo de 8 caracteres y no debe pasar los 49.';
?>
