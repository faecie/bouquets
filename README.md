# Bouquets 
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/faecie/Bouquets/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/faecie/Bouquets/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/faecie/Bouquets/badges/build.png?b=master)](https://scrutinizer-ci.com/g/faecie/Bouquets/build-status/master)
[![Code Coverage](https://scrutinizer-ci.com/g/faecie/Bouquets/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/faecie/Bouquets/?branch=master)

An application that takes the bouquet designs and the stream of flowers as an input, and produce the stream of bouquets as
an output.

## Input / output format specifications
 - A flower specie is identified by a single, lowercase letter: a - z;
 - A flower sizes is indicated by a single, uppercase letter: L (large) and S (small).
 - A flower is identified by a flower specie and a flower size: for example, rL.
 - A bouquet name is indicated by a single, uppercase letter: A - Z;
 - A bouquet size is indicated by a single, uppercase letter: L (large) and S (small).
 - A bouquet design is single line of characters with the following format:
```
<bouquet name><bouquet size><flower 1 quantity><flower 1
specie>...<flower N quantity><flower N specie><total quantity of
flowers in the bouquet>
```

## Quick start
1. Download the [project](https://github.com/faecie/bouquets/archive/master.zip). Or clone the repository:
    ```
    git clone git@github.com:faecie/bouquets.git
    ```
    
2. To run the emulation execute the command inside of the project's folder:
    ```
   make run
   ```
    :exclamation: Requires [Docker](https://docs.docker.com/get-docker/)

