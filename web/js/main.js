jQuery('.myform input').on('change', function() {
	  jQuery.ajax({
           url: "<?php echo \Yii::$app->getUrlManager()->createUrl('cases/ajax') ?>",
           data: {test: test},
           success: function(data) {
               alert(data)
           }
        });
});