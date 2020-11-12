
plugin.tx_hasenbalgadventcal_piadventcal {
    view {
        # cat=plugin.tx_hasenbalgadventcal_piadventcal/file; type=string; label=Path to template root (FE)
        templateRootPath = EXT:hasenbalg_adventcal/Resources/Private/Templates/
        # cat=plugin.tx_hasenbalgadventcal_piadventcal/file; type=string; label=Path to template partials (FE)
        partialRootPath = EXT:hasenbalg_adventcal/Resources/Private/Partials/
        # cat=plugin.tx_hasenbalgadventcal_piadventcal/file; type=string; label=Path to template layouts (FE)
        layoutRootPath = EXT:hasenbalg_adventcal/Resources/Private/Layouts/
    }
    persistence {
        # cat=plugin.tx_hasenbalgadventcal_piadventcal//a; type=string; label=Default storage PID
        storagePid =
    }
}
