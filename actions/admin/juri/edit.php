<?php
$conn    = get_connection();
$db      = new src\Database($conn);
$user    = $db->single('users',[
    'id' => $_GET['id']
]);
if(request()->isMethod('POST'))
{
    $request = request()->post();
    $user    = $db->update('users',[
        'name'     => $request->name,
        'email'    => $request->email,
        'login'    => $request->email,
    ],[
        'id' => $_GET['id']
    ]);

    if(!empty($request->password))
    {
        $user    = $db->update('users',[
            'password' => md5($request->password),
        ],[
            'id' => $_GET['id']
        ]);
    }

    if($user)
        return redirect()->route('admin/juri')->withMessage('success','Data Berhasil Diupdate!');
    return redirect()->route('admin/juri')->withMessage('fail','Data Gagal Diupdate!');
}

return view('admin/juri/edit',['user' => $user]);