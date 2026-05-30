<?php
// File: application/helpers/custom_helper.php

function formatRupiah($angka)
{
    return 'Rp ' . number_format($angka, 2, ',', '.');
}