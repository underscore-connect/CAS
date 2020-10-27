<?php

return [

    # User session
    'path.login' => '/login',
    'path.logout' => '/logout',

    # CAS: service ticket validation
    'path.validate' => '/validate',  # CAS 1.0
    'path.service-validate' => '/serviceValidate',  # CAS 2.0
    'path.service-validate.p3' => '/p3/serviceValidate',  # CAS 3.0

    # CAS: proxy ticket service (CAS 2.0)
    'path.proxy' => '/proxy',

    # CAS: service/proxy ticket validation
    'path.proxy-validate' => '/proxyValidate',  # CAS 2.0
    'path.proxy-validate.p3' => '/p3/proxyValidate'  # CAS 3.0

];
