define([], function (m) {
    const BACKGROUND_IMGAE_WIDTH = 300;
    let iframe,
        form,
        doorPositionInputGroups = {},
        preview,
        backgroundImageThumbnail,
        stop = false,
        previewContext,
        doors = {};

    function renderPreview() {
        previewContext.clearRect(0, 0, preview.width, preview.height);
        previewContext.drawImage(backgroundImageThumbnail, 0, 0, preview.width, preview.height);

        // set door values
        for (const [uid, _] of Object.entries(doors)) {

            previewContext.save();
            previewContext.translate(doors[uid].x, doors[uid].y);
            previewContext.beginPath();
            if (doors[uid].isbigger) {
                previewContext.rect(0, 0, 60, 60);
            } else {
                previewContext.rect(0, 0, 30, 30);
            }
            previewContext.fillStyle = 'white';
            previewContext.fill();
            previewContext.lineWidth = 1;
            previewContext.strokeStyle = 'black';
            previewContext.stroke();
            previewContext.restore();

            previewContext.save();
            previewContext.translate(doors[uid].x, doors[uid].y);
            previewContext.translate(5, 12);
            //   context.font = 'italic 40pt Calibri';
            // previewContext.textAlign = "left";
            previewContext.fillStyle = 'black';
            previewContext.fillText(doors[uid].daynum, 0, 0);
            previewContext.restore();

            // previewContext.save();
            // previewContext.translate(doors[uid].x, doors[uid].y);
            // previewContext.rect(0,0, 30, 30);
            // previewContext.fillStyle = "#8ED6FF";
            // previewContext.fill();
            // previewContext.lineWidth = 1;
            // previewContext.strokeStyle = "black";
            // previewContext.stroke();
            // previewContext.restore();

        }
        // console.log('loop');
        if (!stop) {
            window.requestAnimationFrame(renderPreview);
        }
    }

    function updatePreview() {

        doors = {};
        // set door values
        for (const [uid, _] of Object.entries(doorPositionInputGroups)) {
            doors[uid] = {
                daynum: doorPositionInputGroups[uid].daynumInput.value,
                isbigger: doorPositionInputGroups[uid].isbiggerInput.value == 1,
                x: doorPositionInputGroups[uid].inputs[0].value * preview.width / 100,
                y: doorPositionInputGroups[uid].inputs[1].value * preview.height / 100
            };

        }
    }

    function init() {
        // close all door panels
        const doorPanels = iframe.querySelectorAll('.panel-visible>.panel-heading');
        Array.from(doorPanels).forEach(function (doorPanel) {
            setTimeout(() => {
                doorPanel.click();
            }, 500);
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
                    doorPositionInputGroups[doorUid] = {
                        daynumInput: iframe.querySelector('[name="data[tx_hasenbalgadventcal_domain_model_door][' + doorUid + '][daynum]"]'),
                        isbiggerInput: iframe.querySelector('[name="data[tx_hasenbalgadventcal_domain_model_door][' + doorUid + '][isbigger]"]'),
                        inputs: [input]
                    };

                } else {
                    doorPositionInputGroups[doorUid].inputs.push(input);
                }
            }
        });
        console.log(doorPositionInputGroups);

        // get image ratio
        backgroundImageThumbnail = iframe.querySelector('img.thumbnail');
        const backgroundImageRatio = backgroundImageThumbnail.height / backgroundImageThumbnail.width;

        // paint preview
        preview = document.createElement('canvas');
        preview.className = 'tx_hasenbalgadventcal_domain_model_door_preview';
        preview.width = BACKGROUND_IMGAE_WIDTH * window.devicePixelRatio;
        preview.height = (300 * backgroundImageRatio) * window.devicePixelRatio;
        preview.style.backgroundImage = 'url(\'' + backgroundImageThumbnail.src + '\')';


        //add to dom
        document.querySelector('#typo3-pagetree-tree ul').appendChild(preview);
        previewContext = preview.getContext('2d');


        // start updating the preview
        stop = false;
        window.requestAnimationFrame(renderPreview);

        //decouple update from render to make interface faster
        setInterval(() => {
            if (!stop) {
                updatePreview();
            } else {
                console.log('end');
                clearInterval(this);
            }
        }, 500);

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
        Array.from(oldPreviews).forEach((op) => {
            op.remove();
        });
        doorPositionInputGroups = {};
        stop = true;
    });
});