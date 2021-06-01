<?php
if(request()->isMethod('POST'))
{
    $conn    = get_connection();
    $request = request()->post();
    $db      = new src\Database($conn);

    $participant    = $db->insert('participants',[
        'name'      => $request->name,
        'gender'    => $request->gender,
        'status'    => 'Menunggu',
        'order_number'    => $request->order_number,
    ]);

    if($participant)
        return redirect()->route('admin/peserta')->withMessage('success','Data Berhasil Disimpan!');
    return redirect()->route('admin/peserta')->withMessage('fail','Data Gagal Disimpan!');
}

return view('admin/peserta/create');