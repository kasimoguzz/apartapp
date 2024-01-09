-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 08 Oca 2024, 12:17:29
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `apartdb`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `duyurular`
--

CREATE TABLE `duyurular` (
  `id` int(11) NOT NULL,
  `baslik` varchar(100) NOT NULL,
  `resim` varchar(50) NOT NULL,
  `yayinTarihi` date NOT NULL,
  `altBaslik` varchar(200) NOT NULL,
  `aciklama` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `duyurular`
--

INSERT INTO `duyurular` (`id`, `baslik`, `resim`, `yayinTarihi`, `altBaslik`, `aciklama`) VALUES
(15, 'DUYURU', '1.jpg', '2024-01-06', 'Sayın Apartman Sakinleri', '&lt;p&gt;Sayın Apartman Sakinleri,&lt;/p&gt;\r\n\r\n&lt;p&gt;Uzun bir s&amp;uuml;re&amp;ccedil;ten sonra tekrar bir araya gelmenin mutluluğunu yaşıyoruz. Apartmanımızın g&amp;uuml;venliği ve yaşam kalitesi i&amp;ccedil;in &amp;ouml;nemli konularda sizleri bilgilendirmek istiyoruz:&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Yangın Tatbikatı:&lt;/strong&gt; Bu hafta i&amp;ccedil;inde apartmanımızda yangın tatbikatı ger&amp;ccedil;ekleştirilecektir. L&amp;uuml;tfen acil durum &amp;ccedil;ıkışlarını ve yangın s&amp;ouml;nd&amp;uuml;rme ekipmanlarını kontrol ediniz. Tatbikat g&amp;uuml;n&amp;uuml;yle ilgili ayrıntılı bilgi apartman panomuzda duyurulacaktır.&lt;/p&gt;'),
(16, 'DUYURU', '1.jpg', '2024-01-05', 'Sayın Apartman Sakinleri,', '&lt;p&gt;Sayın Apartman Sakinleri,&lt;/p&gt;\r\n\r\n&lt;p&gt;Uzun bir s&amp;uuml;re&amp;ccedil;ten sonra tekrar bir araya gelmenin mutluluğunu yaşıyoruz. Apartmanımızın g&amp;uuml;venliği ve yaşam kalitesi i&amp;ccedil;in &amp;ouml;nemli konularda sizleri bilgilendirmek istiyoruz:&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;&amp;Ccedil;&amp;ouml;p Toplama Saatleri:&lt;/strong&gt; L&amp;uuml;tfen &amp;ccedil;&amp;ouml;p konteynerlerini belirlenen saatlerde kullanarak &amp;ccedil;&amp;ouml;plerinizi dikkatlice yerleştiriniz. Ayrıca, geri d&amp;ouml;n&amp;uuml;ş&amp;uuml;m kutularını doğru şekilde kullanmaya &amp;ouml;zen g&amp;ouml;sterelim.&lt;/p&gt;'),
(17, 'DUYURU', '1.jpg', '2024-01-08', 'Sayın Apartman Sakinleri', '&lt;p&gt;Sayın Apartman Sakinleri,&lt;/p&gt;\r\n\r\n&lt;p&gt;Uzun bir s&amp;uuml;re&amp;ccedil;ten sonra tekrar bir araya gelmenin mutluluğunu yaşıyoruz. Apartmanımızın g&amp;uuml;venliği ve yaşam kalitesi i&amp;ccedil;in &amp;ouml;nemli konularda sizleri bilgilendirmek istiyoruz:&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Apartman Temizliği:&lt;/strong&gt; Ortak alanların temizliği i&amp;ccedil;in apartman g&amp;ouml;revlisinin belirlediği saatlere dikkat edelim. Herkesin katkısıyla apartmanımızın temiz ve d&amp;uuml;zenli olması i&amp;ccedil;in el birliğiyle &amp;ccedil;alışalım.&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kart_bilgileri`
--

CREATE TABLE `kart_bilgileri` (
  `id` int(11) NOT NULL,
  `kart_numarasi` varchar(16) NOT NULL,
  `son_kullanma_tarihi` varchar(5) NOT NULL,
  `cvv` varchar(3) NOT NULL,
  `kart_sahibi_adi` varchar(100) NOT NULL,
  `kaydet` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kart_bilgileri`
--

INSERT INTO `kart_bilgileri` (`id`, `kart_numarasi`, `son_kullanma_tarihi`, `cvv`, `kart_sahibi_adi`, `kaydet`) VALUES
(22, '1112223334444555', '22/33', '345', 'ali deneme', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `daireno` int(11) NOT NULL,
  `tel` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`id`, `username`, `password`, `email`, `user_type`, `daireno`, `tel`) VALUES
(6, 'admin123', '$2y$10$UcQjdBE.9KhmTXewfzdg9.zvmYTWpkMsp0wadQJ5sNsa30gCxc9PO', 'admin@gmail.com', 'admin', 123, '22222222'),
(7, 'mehmet123', '$2y$10$IJfyohvIlFH.j6nsA9fMj.kBPf.4JSauQIQyit/bz9szst5vZ/dJW', 'mehmet@gmail.com', '', 1, '111111111'),
(8, 'ali123', '$2y$10$DHGU/Rgu0R1YdIki9sNNseQf0GL3eJSsNbnBrD0qMHN8z.0l/GswC', 'ali@gmail.com', '', 2, '43333333'),
(9, 'user123', '$2y$10$dvRVmHcMfGnC0HLr..Vv.uxn.uhOWipW0o.JekVMdmAEfFPWLCYQ2', 'user@gmail.com', '', 3, '444444444'),
(10, 'deneme123', '$2y$10$JjHq/xflnJ2V7jL42VpLlekxV9UZrRUUGfKc8RxXHTrRI6lMtYR7G', 'deneme@gmail.com', '', 5, '5553345422');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sikayetler`
--

CREATE TABLE `sikayetler` (
  `id` int(11) NOT NULL,
  `adSoyad` varchar(100) NOT NULL,
  `sikayet` varchar(255) NOT NULL,
  `tarih` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sikayetler`
--

INSERT INTO `sikayetler` (`id`, `adSoyad`, `sikayet`, `tarih`) VALUES
(5, 'ali deneme', 'deneme şikayet metni', '2024-01-08'),
(6, 'ali deneme', 'deneme şikayet metni lorem ipsum', '2024-01-08');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `duyurular`
--
ALTER TABLE `duyurular`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kart_bilgileri`
--
ALTER TABLE `kart_bilgileri`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Tablo için indeksler `sikayetler`
--
ALTER TABLE `sikayetler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `duyurular`
--
ALTER TABLE `duyurular`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Tablo için AUTO_INCREMENT değeri `kart_bilgileri`
--
ALTER TABLE `kart_bilgileri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `sikayetler`
--
ALTER TABLE `sikayetler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
