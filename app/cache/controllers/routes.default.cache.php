<?php
return array("/connect/(index/)?"=>["controller"=>"controllers\\BasicAuthController","action"=>"index","parameters"=>[],"name"=>"basicAuth.index","cache"=>false,"duration"=>0],"/connect/noAccess/(.+?)/"=>["controller"=>"controllers\\BasicAuthController","action"=>"noAccess","parameters"=>[0],"name"=>"basicAuth.noAccess","cache"=>false,"duration"=>0],"/connect/connect/"=>["post"=>["controller"=>"controllers\\BasicAuthController","action"=>"connect","parameters"=>[],"name"=>"basicAuth.connect","cache"=>false,"duration"=>0]],"/connect/terminate/"=>["controller"=>"controllers\\BasicAuthController","action"=>"terminate","parameters"=>[],"name"=>"basicAuth.terminate","cache"=>false,"duration"=>0],"/connect/info/(.*?)"=>["controller"=>"controllers\\BasicAuthController","action"=>"info","parameters"=>["~0"],"name"=>"basicAuth.info","cache"=>false,"duration"=>0],"/connect/checkConnection/"=>["controller"=>"controllers\\BasicAuthController","action"=>"checkConnection","parameters"=>[],"name"=>"basicAuth.checkConnection","cache"=>false,"duration"=>0],"/connect/forgetConnection/"=>["controller"=>"controllers\\BasicAuthController","action"=>"forgetConnection","parameters"=>[],"name"=>"basicAuth.forgetConnection","cache"=>false,"duration"=>0],"/connect/newAccountCreationRule/"=>["post"=>["controller"=>"controllers\\BasicAuthController","action"=>"newAccountCreationRule","parameters"=>[],"name"=>"basicAuth.newAccountCreationRule","cache"=>false,"duration"=>0]],"/connect/submitCode/"=>["post"=>["controller"=>"controllers\\BasicAuthController","action"=>"submitCode","parameters"=>[],"name"=>"basicAuth.submitCode","cache"=>false,"duration"=>0]],"/connect/sendNew2FACode/"=>["controller"=>"controllers\\BasicAuthController","action"=>"sendNew2FACode","parameters"=>[],"name"=>"basicAuth.sendNew2FACode","cache"=>false,"duration"=>0],"/connect/checkEmail/(.+?)/(.+?)/"=>["controller"=>"controllers\\BasicAuthController","action"=>"checkEmail","parameters"=>[0,1],"name"=>"basicAuth.checkEmail","cache"=>false,"duration"=>0],"/connect/addAccount/"=>["controller"=>"controllers\\BasicAuthController","action"=>"addAccount","parameters"=>[],"name"=>"basicAuth.addAccount","cache"=>false,"duration"=>0],"/connect/createAccount/"=>["post"=>["controller"=>"controllers\\BasicAuthController","action"=>"createAccount","parameters"=>[],"name"=>"basicAuth.createAccount","cache"=>false,"duration"=>0]],"/connect/recoveryInit/"=>["controller"=>"controllers\\BasicAuthController","action"=>"recoveryInit","parameters"=>[],"name"=>"basicAuth.recoveryInit","cache"=>false,"duration"=>0],"/connect/recoveryInfo/"=>["post"=>["controller"=>"controllers\\BasicAuthController","action"=>"recoveryInfo","parameters"=>[],"name"=>"basicAuth.recoveryInfo","cache"=>false,"duration"=>0]],"/connect/recovery/(.+?)/(.+?)/"=>["controller"=>"controllers\\BasicAuthController","action"=>"recovery","parameters"=>[0,1],"name"=>"basicAuth.recovery","cache"=>false,"duration"=>0],"/connect/recoverySubmit/"=>["post"=>["controller"=>"controllers\\BasicAuthController","action"=>"recoverySubmit","parameters"=>[],"name"=>"basicAuth.recoverySubmit","cache"=>false,"duration"=>0]],"/vms/"=>["controller"=>"controllers\\IndexController","action"=>"vms","parameters"=>[],"name"=>"index.vms","cache"=>false,"duration"=>0],"/server/"=>["controller"=>"controllers\\IndexController","action"=>"server","parameters"=>[],"name"=>"index.server","cache"=>false,"duration"=>0]);
