<?php
echo $this->render('../template/_form', ['model' => $model, 
    'formFields' => ['name', 'photo', 'description', 'start_year'], 'image' => $image]);