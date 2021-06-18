<?php
if($user = session()->get('user'))
{ 
    return redirect()->route($user->level);
}

$conn    = get_connection();
$db      = new src\Database($conn);

if(request()->isMethod('POST'))
{
    $request = request()->post();

    $user    = $db->single('users',[
        'login'    => $request->login,
        'password' => md5($request->password),
        'level'    => 'juri'
    ]);

    if($user)
    {
        $category = $db->single('categories',[
            'id' => $request->kategori
        ]);
        session()->set([
            'user'=>$user,
            'juri'=>$request->juri,
            'kategori'=>$category,
        ]);
        return redirect()->route('auth/login');
    }

    return redirect()->route('auth/login')->withMessage('fail','Login Gagal!');


}

$categories = $db->all('categories');
return partial('auth/login',[
    'categories' => $categories
]);