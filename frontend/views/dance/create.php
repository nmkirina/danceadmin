<?php
echo $this->render('../template/_create.php', ['model' => $model, 
    'modelName' => 'Dances', 
    'formFields' => ['name', 'description', 'start_year']]);

