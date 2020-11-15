
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

module.tx_hasenbalgadventcal_modadventcal {
    view {
        # cat=module.tx_hasenbalgadventcal_modadventcal/file; type=string; label=Path to template root (BE)
        templateRootPath = EXT:hasenbalg_adventcal/Resources/Private/Backend/Templates/
        # cat=module.tx_hasenbalgadventcal_modadventcal/file; type=string; label=Path to template partials (BE)
        partialRootPath = EXT:hasenbalg_adventcal/Resources/Private/Backend/Partials/
        # cat=module.tx_hasenbalgadventcal_modadventcal/file; type=string; label=Path to template layouts (BE)
        layoutRootPath = EXT:hasenbalg_adventcal/Resources/Private/Backend/Layouts/
    }
    persistence {
        # cat=module.tx_hasenbalgadventcal_modadventcal//a; type=string; label=Default storage PID
        storagePid =
    }
}
