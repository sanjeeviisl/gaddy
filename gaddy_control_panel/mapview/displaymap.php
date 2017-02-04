<!DOCTYPE html>
<html>
<?php>
include "../header.php"
?>
<script src="js/updated_maps.js"></script>
<div ui-view>
	<div style="position:relative;left:225px;top:0px">
    <div class="box-body" >
        <div class="row">
            <div class="col-sm-4" id="toplogo">
                <img id="halimage" src="images/gpstracker-man-blue-37.png">Tracker by Intime Information systems Pvt Ltd
            </div>
            <div class="col-sm-8" id="messages"></div>
        </div>
        <div class="row">
            <div class="col-sm-10" id="mapdiv">
                <div id="map-canvas"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-10" id="selectdiv">
                <select id="routeSelect" tabindex="1"></select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2 deletediv">
                <input type="button" id="delete" value="Delete" tabindex="2" class="btn btn-primary">
            </div>
            <div class="col-sm-2 autorefreshdiv">
                <input type="button" id="autorefresh" value="Auto Refresh Off" tabindex="3" class="btn btn-primary">
            </div>
            <div class="col-sm-2 refreshdiv">
                <input type="button" id="refresh" value="Refresh" tabindex="4" class="btn btn-primary">
            </div>
            <div class="col-sm-2 viewalldiv">
                <input type="button" id="viewall" value="View All" tabindex="5" class="btn btn-primary">
            </div>
        </div>
    </div>       
    </div>       
</div>

<?php>
include "../footer.php"
?>

</body>
</html>