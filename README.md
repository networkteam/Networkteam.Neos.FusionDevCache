# Neos Fusion development cache

Do you have a lot of Fusion code and requests when developing Neos are getting slow?
It turns out that Neos doesn't activate the Fusion object tree (the parsed and merged representation of all
included Fusion files) during development.

This small package activates the fusion object tree cache also for the `Development` context and flushes
the cache on changes to Fusionf files.

## Installation

Install the package and rescan Flow packages:

    composer require --dev networkteam/neos-fusiondevcache
    ./flow neos.flow:package:rescan

The setting should now be active and the Fusion object tree should be cached during development.

## License

See [LICENSE](LICENSE) file for license rights and limitations (MIT).
