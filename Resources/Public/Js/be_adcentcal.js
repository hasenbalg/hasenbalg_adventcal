define([], function (m) {
    const BACKGROUND_IMGAE_WIDTH = 300;
    let iframe,
        form,
        doorPositionInputGroups = {},
        preview,
        backgroundImageThumbnail;

    function updatePreview() {
        
        // set door values
        for (const [uid, _] of Object.entries(doorPositionInputGroups)) {
            const door = document.getElementById('tx_hasenbalgadventcal_domain_model_door-' + uid);
            if(door != null){
                door.style.left = doorPositionInputGroups[uid][0].value + '%';
                door.style.top = doorPositionInputGroups[uid][1].value + '%';
            }
        }
        // console.log('loop');
        // loop update the preview
        window.requestAnimationFrame(updatePreview);
    }

    function init() {
        // close all door panels
        const doorPanels = iframe.querySelectorAll('.panel-visible .panel-heading');
        Array.from(doorPanels).forEach(function (doorPanel) {
            doorPanel.click();
        });

        // add listeners to inputs
        let inputs = iframe.querySelectorAll('input');
        Array.from(inputs).forEach((input) => {
            const attributeString = input.getAttribute('data-formengine-validation-rules');
            // only inputs for doubles
            if (attributeString != null && JSON.parse(attributeString).length > 0 && JSON.parse(attributeString)[0].type == 'double2') {
                // collect all inputs and sort them by door
                // 'data[tx_hasenbalgadventcal_domain_model_door][9][posy]'
                const doorUid = input.getAttribute('data-formengine-input-name').split('][')[1];
                if (doorPositionInputGroups[doorUid] == null) {
                    doorPositionInputGroups[doorUid] = [input]
                } else {
                    doorPositionInputGroups[doorUid].push(input);
                }
            }
        });
        
        // get image ratio
        backgroundImageThumbnail = iframe.querySelector('img.thumbnail');
        const backgroundImageRatio = backgroundImageThumbnail.height/backgroundImageThumbnail.width;

        // paint preview
        preview = document.createElement('div');
        preview.className = 'tx_hasenbalgadventcal_domain_model_door_preview';
        preview.style.width = BACKGROUND_IMGAE_WIDTH + 'px';
        preview.style.height = (300 * backgroundImageRatio) + 'px';
        preview.style.backgroundImage = 'url(\'' + backgroundImageThumbnail.src + '\')';

        //add doors
        for (const [uid, _] of Object.entries(doorPositionInputGroups)) {
            const door = document.createElement('div');
            door.className = 'tx_hasenbalgadventcal_domain_model_door';
            door.id = 'tx_hasenbalgadventcal_domain_model_door-' + uid;
            preview.append(door);
        }
        //add to dom
        document.querySelector('#typo3-pagetree-tree ul').appendChild(preview);


        // start updating the preview
        window.requestAnimationFrame(updatePreview);

    }
    // check if the right side iframe is changed
    document.getElementById('typo3-contentIframe').addEventListener('load', function () {
        iframe = this.contentWindow.document
        const tagsWithInterestingDataAttribute = iframe.querySelectorAll('[data-table="tx_hasenbalgadventcal_domain_model_calendar"]');
        Array.from(tagsWithInterestingDataAttribute).forEach(function (tag) {
            // this is the page where you edit the calendar
            if (tag.hasAttribute('data-field') && tag.getAttribute('data-field') == 'doors') { // form for dors must be on iframe
                // give typo3 be time to be slow
                setTimeout(() => init(), 2000);
            }
            return;
        });
        // clean up, there might be a preview left
        const oldPreviews = document.querySelectorAll('.tx_hasenbalgadventcal_domain_model_door_preview');
        Array.from(oldPreviews).forEach((op)=>{
            op.remove();
        });
        doorPositionInputGroups = {};
    });
});