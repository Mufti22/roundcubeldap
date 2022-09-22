//Разрешить поиск и автодополнение из массива AD 
$rcmail_config['autocomplete_addressbooks'] = array('sql','AD');
 
$config['ldap_public'] = array(
//Имя массива, в котором выполняется поиск
    'AD' =>array (
        'name' => 'GAB', //Отображаемое имя в интерфейсе WEBMail Roundcube
        'hosts' => array('192.168.1.1'), //IP адрес или ДНС имя
        'sizelimit' => 600,
        'port' => 389,
        'use_tls' => false,
        'user_specific' => false,
        'base_dn' => 'DC=local,DC=domain', //Где выполнять поиск
        'bind_dn' => 'kost@local.domain', //Авторизация на контроллере домена
        'bind_pass' => 'password', //Авторизация на контроллере домена
        'writable' => false,
        'ldap_version' => 3,
        'search_fields' => array(
           'mail',
           'cn',
        ),
        'name_field' => 'cn',
        'email_field' => 'mail',
        'surname_field' => 'sn',
        'firstname_field' => 'givenName',
        //Можно добавить немного дополнительной информации в адресной книге
        'organization_field'     => 'company',
        'jobtitle_field'    => 'title',
        'department_field'   => 'department',
        //Порядок сортировки
        'sort' => 'sn',
        'scope' => 'sub', //Выполнять поиск по всему каталогу LDAP // search mode: sub|base|list
        'filter' => '(&(mail=*)(|(&(objectClass=user)(!(objectClass=computer)))(objectClass=group)))',
        //'filter' => '(&(mail=*)(|(&(objectcategory=person)(!(objectClass=computer)))(objectClass=group)))',
        'global_search' => true,
        'fuzzy_search' => true
    ),
);
 
// ----------------------------------
// LDAP
// ----------------------------------
// Type of LDAP cache. Supported values: 'db', 'apc' and 'memcache'.
$config['ldap_cache'] = 'db';
// Lifetime of LDAP cache. Possible units: s, m, h, d, w
$config['ldap_cache_ttl'] = '10m';