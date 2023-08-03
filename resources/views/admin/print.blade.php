<html>
    <head>
        <?php foreach ($transaksi as $t): ?>
        <title>Print Nota {{$t->transaksi_kode}}</title>
        <?php endforeach; ?>
        <link rel="stylesheet" href="<?= asset('css/print.css?time='. md5(time())) ?>">
        <link href="{{ asset('assets/css/print.css?time='. md5(time())) }}" rel="stylesheet">
    </head>
    <body class="struk" onload="printOut()">
        <section class="sheet">
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <td>Peminjaman Buku SMAN 21 BANDUNG</td>
                    <td>Jln Manjalega Bandung</td>
                </tr>
            </table>
            <?php foreach ($transaksi as $t): ?>
                <table cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td align="left" class="txt-left">Nota &nbsp;</td>
                        <td align="left" class="txt-left">:</td>
                        <td align="left" class="txt-left">{{$t->transaksi_kode}}</td>
                    </tr>
                    <tr>
                        <td align="left" class="txt-left">Siswa &nbsp;</td>
                        <td align="left" class="txt-left">:</td>
                        <td align="left" class="txt-left">{{$t->siswa_nama}}</td>
                    </tr>
                    <tr>
                        <td align="left" class="txt-left">Tgl Pinjam &nbsp;</td>
                        <td align="left" class="txt-left">:</td>
                        <td align="left" class="txt-left">{{$t->transaksi_tanggalpinjam}}</td>
                    </tr>
                    <tr>
                        <td align="left" class="txt-left">Tgl Kembali &nbsp;</td>
                        <td align="left" class="txt-left">:</td>
                        <td align="left" class="txt-left"><strong>{{$t->transaksi_tanggalkembali}}</strong></td>
                    </tr>
                </table>
            <?php endforeach ?>


        <?php
            echo '<br/>';
            $tItem = 'Item'. str_repeat("&nbsp;", (13 - strlen('Item')));
            $tQty  = 'Qty'. str_repeat("&nbsp;", (6 - strlen('Qty')));
            $caption = $tItem. $tQty;

            echo    '<table cellpadding="0" cellspacing="0" style="width:100%">
                        <tr>
                            <td align="left" class="txt-left">'. $caption . '</td>
                        </tr>
                        <tr>
                            <td align="left" class="txt-left">'. str_repeat("=", 38) . '</td>
                        </tr>';
            
                foreach($detail as $d)
                {
                    $item = $d->buku_judul. str_repeat("&nbsp;", (38 - (strlen($d->buku_judul))));
                    echo '<tr>';
                        echo'<td align="left" class="txt-left">'.$item.'</td>';
                    echo '</tr>';

                    echo '<tr>';
                    $qty        = $d->detailtransaksi_jumlah. str_repeat("&nbsp;", ( 13 - strlen($d->detailtransaksi_jumlah)) );
                    
                        echo'<td class="txt-left" align="left">'.$qty.'</td>';
                    
                    echo '</tr>';
                }

               
            echo '</table>';

            $footer = 'Terima kasih atas kunjungan anda';
            $starSpace = ( 32 - strlen($footer) ) / 2;
            $starFooter = str_repeat('*', $starSpace+1);
            echo($starFooter. '&nbsp;'.$footer . '&nbsp;'. $starFooter."<br/><br/><br/><br/>");
            echo '<p>&nbsp;</p>';  
            
        ?>
        </section>
        
    </body>
    <script>
                var lama = 1000;
                t = null;
                function printOut(){
                    window.print();
                    t = setTimeout("self.close()",lama);
                }
    </script>
</html>