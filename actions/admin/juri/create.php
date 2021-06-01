<?php
if(request()->isMethod('POST'))
{
    $conn    = get_connection();
    $request = request()->post();
    $db      = new src\Database($conn);

    $user    = $db->insert('users',[
        'name'     => $request->name,
        'email'    => $request->email,
        'login'    => $request->email,
        'password' => md5($request->password),
        'level'    => 'juri'
    ]);

    if($user)
        return redirect()->route('admin/juri')->withMessage('success','Data Berhasil Disimpan!');
    return redirect()->route('admin/juri')->withMessage('fail','Data Gagal Disimpan!');
}

return view('admin/juri/create');