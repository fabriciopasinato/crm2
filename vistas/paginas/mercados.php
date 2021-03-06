<script src="https://cdn.ckeditor.com/ckeditor5/18.0.0/classic/ckeditor.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://kit.fontawesome.com/b6b59e7f17.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<?php include "modulosVarios/header.php"; ?>

<center>
<!-- TradingView Widget BEGIN: GRAFICO de mercados -->
<div class="tradingview-widget-container">
  <div id="tradingview_7c14c"></div>
  <div class="tradingview-widget-copyright"><a href="https://es.tradingview.com/symbols/NASDAQ-AAPL/" rel="noopener" target="_blank"><span class="blue-text"></span></a> </div>
  <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
  <script type="text/javascript">
  new TradingView.widget(
  {
  "width": "100%",
  "height": "850vh",
  "symbol": "USDARS",
  "interval": "D",
  "timezone": "Etc/UTC",
  "theme": "dark",
  "style": "1",
  "locale": "es",
  "toolbar_bg": "#f1f3f6",
  "enable_publishing": true,
  "withdateranges": true,
  "hide_side_toolbar": false,
  "allow_symbol_change": true,
  "details": true,
  "hotlist": true,
  "calendar": true,
  "container_id": "tradingview_7c14c"
}
  );
  </script>
</div>
<!-- TradingView Widget END -->
<br>

<!-- TradingView Widget BEGIN: Calendario -->
<div class="tradingview-widget-container container">
  <div class="tradingview-widget-container__widget"></div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-events.js" async>
  {
  "width": "100%",
  "height": "360",
  "colorTheme": "dark",
  "isTransparent": false,
  "locale": "es",
  "importanceFilter": "0,1",
  "currencyFilter": "USD,ARS,EUR,CNY,BRL"
}
  </script>
</div>
<!-- TradingView Widget END -->
<br>

<!-- TradingView Widget BEGIN: Mercado de Cryptomonedas -->
<div class="container tradingview-widget-container">
<div class="tradingview-widget-container__widget"></div>
<script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-screener.js" async>
    {
    "width": "100%",
    "height": 480,
    "defaultColumn": "overview",
    "screener_type": "crypto_mkt",
    "displayCurrency": "USD",
    "colorTheme": "dark",
    "locale": "es"
    }
  </script>
</div>
<!-- TradingView Widget END -->
<br>

<!-- TradingView Widget BEGIN: Cryptomonedas -->
<div class="container tradingview-widget-container">
        <div class="tradingview-widget-container__widget"></div>
        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-quotes.js" async>
        {
            "title": "Criptomonedas",
            "title_raw": "Cryptocurrencies",
            "title_link": "/markets/cryptocurrencies/prices-all/",
            "width": "100%",
            "height": 480,
            "locale": "es",
            "showSymbolLogo": true,
            "symbolsGroups": [
        {
            "name": "Vista general",
        "symbols": [
        {
          "name": "BITSTAMP:BTCUSD"
        },
        {
          "name": "BITSTAMP:ETHUSD"
        },
        {
          "name": "BITSTAMP:XRPUSD"
        },
        {
          "name": "COINBASE:BCHUSD"
        },
        {
          "name": "COINBASE:LTCUSD"
        },
        {
          "name": "BITFINEX:IOTUSD"
        }
      ]
    },
    {
      "name": "Bitcoin",
      "symbols": [
        {
          "name": "BITSTAMP:BTCUSD"
        },
        {
          "name": "COINBASE:BTCEUR"
        },
        {
          "name": "COINBASE:BTCGBP"
        },
        {
          "name": "BITFLYER:BTCJPY"
        },
        {
          "name": "CEXIO:BTCRUB"
        },
        {
          "name": "CME:BTC1!"
        }
      ]
    },
    {
      "name": "XRP",
      "symbols": [
        {
          "name": "BITSTAMP:XRPUSD"
        },
        {
          "name": "KRAKEN:XRPEUR"
        },
        {
          "name": "KORBIT:XRPKRW"
        },
        {
          "name": "BITSO:XRPMXN"
        },
        {
          "name": "BINANCE:XRPBTC"
        },
        {
          "name": "BITTREX:XRPETH"
        }
      ]
    },
    {
      "name": "Ethereum",
      "symbols": [
        {
          "name": "COINBASE:ETHUSD"
        },
        {
          "name": "KRAKEN:ETHEUR"
        },
        {
          "name": "KRAKEN:ETHGBP"
        },
        {
          "name": "KRAKEN:ETHJPY"
        },
        {
          "name": "POLONIEX:ETHBTC"
        },
        {
          "name": "KRAKEN:ETHXBT"
        }
      ]
    },
    {
      "name": "Bitcoin en efectivo",
      "symbols": [
        {
          "name": "COINBASE:BCHUSD"
        },
        {
          "name": "BITSTAMP:BCHEUR"
        },
        {
          "name": "CEXIO:BCHGBP"
        },
        {
          "name": "BITSTAMP:BCHBTC"
        },
        {
          "name": "HITBTC:BCHETH"
        },
        {
          "name": "KRAKEN:BCHXBT"
        }
      ]
    }
  ],
  "colorTheme": "dark"
}
    </script>
</div>
<!-- TradingView Widget END -->
<br>

<!-- Conjunto financiero de empresas y paises -->
<div style="display: flex !important; align-items: flex-end !important;" class="container">
    <!-- TradingView Widget BEGIN: ACCIONES-->
    <div class="tradingview-widget-container" style="margin-right:1% !important;">
    <div class="tradingview-widget-container__widget"></div>
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-quotes.js" async>
  {
  "title": "Acciones",
  "width": "99%",
  "height": 480,
  "locale": "es",
  "showSymbolLogo": true,
  "symbolsGroups": [
    {
      "name": "Financiero",
      "symbols": [
        {
          "name": "NYSE:JPM",
          "displayName": "Jpmorgan Chase & Co"
        },
        {
          "name": "NYSE:WFC",
          "displayName": "Wells Fargo Co New"
        },
        {
          "name": "NYSE:BAC",
          "displayName": "Bank Amer Corp"
        },
        {
          "name": "NYSE:HSBC",
          "displayName": "Hsbc Hldgs Plc"
        },
        {
          "name": "NYSE:C",
          "displayName": "Citigroup Inc"
        },
        {
          "name": "NYSE:MA",
          "displayName": "Mastercard Incorporated"
        }
      ]
    },
    {
      "name": "Tecnolog??a",
      "symbols": [
        {
          "name": "NASDAQ:AAPL",
          "displayName": "Apple"
        },
        {
          "name": "NASDAQ:GOOGL",
          "displayName": "Google Inc"
        },
        {
          "name": "NASDAQ:MSFT",
          "displayName": "Microsoft Corp"
        },
        {
          "name": "NASDAQ:FB",
          "displayName": "Facebook Inc"
        },
        {
          "name": "NYSE:ORCL",
          "displayName": "Oracle Corp"
        },
        {
          "name": "NASDAQ:INTC",
          "displayName": "Intel Corp"
        }
      ]
    },
    {
      "name": "Servicios",
      "symbols": [
        {
          "name": "NASDAQ:AMZN",
          "displayName": "Amazon Com Inc"
        },
        {
          "name": "NYSE:BABA",
          "displayName": "Alibaba Group Hldg Ltd"
        },
        {
          "name": "NYSE:T",
          "displayName": "At&t Inc"
        },
        {
          "name": "NYSE:WMT",
          "displayName": "Wal-Mart Stores Inc"
        },
        {
          "name": "NYSE:V",
          "displayName": "Visa Inc"
        }
      ]
    }
  ],
  "colorTheme": "dark"
}
  </script>
    </div>
    <!-- TradingView Widget END -->

    <!-- TradingView Widget BEGIN: INDICES -->
    <div class="tradingview-widget-container" style="margin-left:1% !important;">
    <div class="tradingview-widget-container__widget"></div>
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-quotes.js" async>
    {
  "title": "??ndices",
  "width": "99%",
  "height": 480,
  "locale": "es",
  "showSymbolLogo": true,
  "symbolsGroups": [
    {
      "name": "EEUU y Canad??",
      "symbols": [
        {
          "name": "FOREXCOM:SPXUSD",
          "displayName": "S&P 500"
        },
        {
          "name": "FOREXCOM:NSXUSD",
          "displayName": "Nasdaq 100"
        },
        {
          "name": "CME_MINI:ES1!",
          "displayName": "S&P 500"
        },
        {
          "name": "INDEX:DXY",
          "displayName": "??ndice divisa d??lar estadounidense"
        },
        {
          "name": "FOREXCOM:DJI",
          "displayName": "Dow 30"
        }
      ]
    },
    {
      "name": "Europa",
      "symbols": [
        {
          "name": "INDEX:SX5E",
          "displayName": "Euro Stoxx 50"
        },
        {
          "name": "FOREXCOM:UKXGBP",
          "displayName": "UK 100"
        },
        {
          "name": "INDEX:DEU40",
          "displayName": "??ndice DAX"
        },
        {
          "name": "INDEX:CAC40",
          "displayName": "??ndice CAC 40"
        },
        {
          "name": "INDEX:SMI"
        }
      ]
    },
    {
      "name": "Asia Pac??fico",
      "symbols": [
        {
          "name": "INDEX:NKY",
          "displayName": "Nikkei 225"
        },
        {
          "name": "INDEX:HSI",
          "displayName": "Hang Seng"
        },
        {
          "name": "BSE:SENSEX",
          "displayName": "BSE SENSEX"
        },
        {
          "name": "BSE:BSE500"
        },
        {
          "name": "INDEX:KSIC",
          "displayName": "Kospi Composite"
        }
      ]
    }
  ],
  "colorTheme": "dark"
}
    </script>
    </div>
    <!-- TradingView Widget END -->
</div>
<br>

<!-- Conjunto financiero de materia prima y monedas -->
<div style="display: flex !important; align-items: flex-end !important;" class="container">
    <!-- TradingView Widget BEGIN -->
    <div class="tradingview-widget-container" style="margin-right:1% !important;">
    <div class="tradingview-widget-container__widget"></div>
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-quotes.js" async>
    {
  "title": "Materias primas",
  "width": "99%",
  "height": 480,
  "locale": "es",
  "showSymbolLogo": true,
  "symbolsGroups": [
    {
      "name": "Energ??a",
      "symbols": [
        {
          "name": "NYMEX:CL1!",
          "displayName": "Petr??leo"
        },
        {
          "name": "NYMEX:NG1!",
          "displayName": "Gas natural"
        },
        {
          "name": "TVC:UKOIL",
          "displayName": "Petr??leo Brent"
        },
        {
          "name": "NYMEX:RB1!",
          "displayName": "Gasolina"
        },
        {
          "name": "NYMEX:HO1!",
          "displayName": "Combustible para calefacci??n"
        },
        {
          "name": "NYMEX:AEZ1!",
          "displayName": "Etanol"
        }
      ]
    },
    {
      "name": "Metales",
      "symbols": [
        {
          "name": "COMEX:GC1!",
          "displayName": "Oro"
        },
        {
          "name": "COMEX:SI1!",
          "displayName": "Plata"
        },
        {
          "name": "NYMEX:PL1!",
          "displayName": "Platino"
        },
        {
          "name": "COMEX_MINI:QC1!",
          "displayName": "Cobre"
        },
        {
          "name": "COMEX:ZNC1!",
          "displayName": "Zinc"
        }
      ]
    },
    {
      "name": "Agricultura",
      "symbols": [
        {
          "name": "NYMEX:KT1!",
          "displayName": "Caf??"
        },
        {
          "name": "NYMEX:TT1!",
          "displayName": "Algod??n"
        },
        {
          "name": "CBOT:ZS1!",
          "displayName": "Soja"
        },
        {
          "name": "CBOT:ZW1!",
          "displayName": "Trigo"
        },
        {
          "name": "NYMEX:YO1!",
          "displayName": "Az??car"
        },
        {
          "name": "CBOT:ZC1!",
          "displayName": "Ma??z"
        }
      ]
    },
    {
      "name": "Divisas",
      "symbols": [
        {
          "name": "CME:6E1!",
          "displayName": "Euro"
        },
        {
          "name": "CME:6B1!",
          "displayName": "Libra esterlina"
        },
        {
          "name": "CME:6J1!",
          "displayName": "Yen japon??s"
        },
        {
          "name": "CME:6S1!",
          "displayName": "Franco suizo"
        },
        {
          "name": "CME:6A1!",
          "displayName": "D??lar australiano"
        },
        {
          "name": "CME:6C1!",
          "displayName": "D??lar canadiense"
        }
      ]
    },
    {
      "name": "??ndices",
      "symbols": [
        {
          "name": "CME:SP1!",
          "displayName": "S&P 500"
        },
        {
          "name": "CME_MINI:NQ1!",
          "displayName": "Nasdaq 100"
        },
        {
          "name": "CBOT_MINI:YM1!",
          "displayName": "Dow 30"
        },
        {
          "name": "CME:NKD1!",
          "displayName": "Nikkei 225"
        },
        {
          "name": "EUREX:FDAX1!",
          "displayName": "DAX"
        },
        {
          "name": "CME:IBV1!",
          "displayName": "IBovespa"
        }
      ]
    },
    {
      "name": "Tipos de inter??s",
      "symbols": [
        {
          "name": "CBOT:ZN1!",
          "displayName": "Pagar?? del tesoro a 10 a??os"
        },
        {
          "name": "CBOT:ZF1!",
          "displayName": "Pagar?? del tesoro a 5 a??os"
        },
        {
          "name": "CBOT:Z3N1!",
          "displayName": "Pagar?? del tesoro a 3 a??os"
        },
        {
          "name": "CBOT:ZT1!",
          "displayName": "Pagar?? del tesoro a 2 a??os"
        },
        {
          "name": "CBOT:ZQ1!",
          "displayName": "Tipo de inter??s de los fondos de la reserva federal a 30 d??as"
        },
        {
          "name": "CBOT:ZB1!",
          "displayName": "T-Bond"
        }
      ]
    }
  ],
  "colorTheme": "dark"
}
    </script>
    </div>
    <!-- TradingView Widget END -->

    <!-- TradingView Widget BEGIN -->
    <div class="tradingview-widget-container" style="margin-left:1% !important;">
    <div class="tradingview-widget-container__widget"></div>
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-quotes.js" async>
    {
  "title": "Divisas",
  "title_link": "/markets/currencies/rates-major/",
  "width": "99%",
  "height": 480,
  "locale": "es",
  "showSymbolLogo": true,
  "symbolsGroups": [
    {
      "name": "Principal",
      "symbols": [
        {
          "name": "FX_IDC:EURUSD"
        },
        {
          "name": "FX_IDC:USDJPY"
        },
        {
          "name": "FX_IDC:GBPUSD"
        },
        {
          "name": "FX_IDC:AUDUSD"
        },
        {
          "name": "FX_IDC:USDCAD"
        },
        {
          "name": "FX_IDC:USDCHF"
        }
      ]
    },
    {
      "name": "Menor",
      "symbols": [
        {
          "name": "FX_IDC:EURGBP"
        },
        {
          "name": "FX_IDC:EURJPY"
        },
        {
          "name": "FX_IDC:GBPJPY"
        },
        {
          "name": "FX_IDC:CADJPY"
        },
        {
          "name": "FX_IDC:GBPCAD"
        },
        {
          "name": "FX_IDC:EURCAD"
        }
      ]
    },
    {
      "name": "Ex??tica",
      "symbols": [
        {
          "name": "FX_IDC:USDSEK"
        },
        {
          "name": "FX_IDC:USDMXN"
        },
        {
          "name": "FX_IDC:USDZAR"
        },
        {
          "name": "FX_IDC:EURTRY"
        },
        {
          "name": "FX_IDC:EURNOK"
        },
        {
          "name": "FX_IDC:GBPPLN"
        }
      ]
    }
  ],
  "colorTheme": "dark"
}
    </script>
    </div>
    <!-- TradingView Widget END -->
</div>
<br>

<!-- TradingView Widget BEGIN: MAPAS DE CALOR FOREX -->
<div class="container tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-forex-heat-map.js" async>
  {
  "width": "100%",
  "height": "720",
  "currencies": [
    "ARS",
    "BRL",
    "EUR",
    "USD",
    "JPY",
    "GBP",
    "CHF",
    "AUD",
    "CAD",
    "NZD",
    "CNY",
    
    "UYU"
  ],
  "isTransparent": false,
  "colorTheme": "dark",
  "locale": "es"
}
  </script>
</div>
<!-- TradingView Widget END -->
<br>


<!-- TradingView Widget BEGIN: MERCADO DE DIVISAS -->
<div class="tradingview-widget-container container">
  <div class="tradingview-widget-container__widget">
  </div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-forex-cross-rates.js" async>
  {
  "width": "100%",
  "height": "700",
  "currencies": [
    "ARS",
    "EUR",
    "USD",
    "JPY",
    "GBP",
    "BRL",
    "AUD",
    "CAD",
    "NZD",
    "CNY",
    "MXN",
    "KRW",
    "RUB",
    "CLP",
    "UYU"
  ],
  "isTransparent": false,
  "colorTheme": "dark",
  "locale": "es"
}
  </script>
</div>
<!-- TradingView Widget END -->

<br>
</center>
<div style="background-color: #171717; width: 100%; height: 30px; border-bottom: 4px solid #384045; border-top: 6px solid #b2132b;"></div>
<!-- Estilos Css -->
<style type="text/css">
  body{
    background-image: url(style/img/hexagono.png);
  }
</style>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>