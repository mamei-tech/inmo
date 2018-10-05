$(document).ready(function () {
    // function saveImage() {
    //     var image = $("[name=foto]").val().split('base64,')[1];
    //     if (image)
    //         utils.ajax({
    //             url: "",
    //             data: {image: image},
    //             success: function () {
    //                 window.location.reload();
    //             }
    //         });
    // }


    var image = document.getElementById("image");

    window.cropper = new Cropper(image,
        {
            autoCrop: true,
            aspectRatio: 1,
            viewMode: 1,
            dragMode: 'move',
            movable: false,
            scalable: false,
            zoomable: false,
            minCropBoxWidth: 150,
            minCropBoxHeight: 150,
            preview: document.getElementById("preview"),
            cropend: function () {
                var canvas = cropper.getCroppedCanvas({width: 200, height: 200});
                $("[name=foto]").val(canvas.toDataURL());
            },
            ready: function () {
                var canvas = cropper.getCroppedCanvas({width: 200, height: 200});
                $("[name=foto]").val(canvas.toDataURL());
            }
        });

    function showPreview(e) {
        var input = e.target;
        if (input.files && input.files.length) {
            var filename = input.files[0].name;
            var ext = filename.substring(filename.lastIndexOf(".") + 1).toLowerCase();
            if (ext === "gif" || ext === "png" || ext === "jpeg" || ext === "jpg") { //|| ext === "bmp"
                var reader = new FileReader();
                reader.onload = function (e) {
                    var data = e.target.result;
                    data = data.split('base64,')[1];
                    cropper.replace(e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                console.log("invalid file");
                alertify.error("Tipo de archivo no valido: " + filename);
            }
        }
    }

    $("#input").on("change", showPreview);
    document.getElementById("preview").onclick = function () {
        $("#exampleModal").modal('show')
    };
});

function sendTestimonials() {
    console.log($("[name=foto]").val());

    if ($("[name=foto]").val() == "")
    {
        // TODO Falta poner la imagen que va cuando no suben ninguna el user
        $("[name=foto]").val("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMgAAADICAYAAACtWK6eAAAgAElEQVR4Xu2d969EVdWGZz67YEdBUQFFBKUIKqJGjUaNSsReYosaW4wx6i/+pv+TsWBBQBQRxYoNFbH33uv98mx5Ju9d7HNm5tZzLzPJzcydOWefXda73rXWXnvv+fvf//6t2QG9/v73v8+uvPLK2R//+MfZQx/60NkjH/nI2U9/+tPZt771rdmpp546e+xjHzu7853vfEC12TxmP3pga2tr9re//W3217/+dfanP/2p/f3nP/+Zzefz9s7vjPHd73732V3ucpf2fs973nN2pzvdaT+qs+sy5wcJkH/961+zT37yk7Pf/e53swc/+MGzRz3qUbNf/vKXs69//euzBzzgAbPHP/7xs7ve9a67btSmgMPtAcAhQP785z/P/v3vf48C5B73uMdkFeOBAoSOuuKKK2a//e1vZw984ANn5513Xvv81a9+dXa/+91vdvHFFzeNsnkd7R6oDCJA/vvf/874gy1OOOGExiB3u9vdZgCEz1N8HShAoFhMLFjjlFNOmV1wwQWz3//+97Mvf/nLs/ve974NIHTc5nW0ewCA8IcpDYNgOWBiVYBgagmQqVoOBw6Qq6++evbzn/98dvLJJzeA0IkABDv0kksumZ144olHWzo2tZ/ha6YP0gOIPsixBAiOFn9oBf5WfUG1V111VWOQ+9///rPHPOYxs7/85S+zL37xi41mAQjvm9fR7oF//OMfbVxhD/74HzlBZmCRO97xjs2UTgYBKFN8rcwgRidoOILOH429wx3u0Br6f//3f+0zAk4H9F7cA4P84he/aCbVhRde2DrvS1/6UnPOAci97nWvKfbTpk5r9ABjKoMgLzBKAgQ5kUEYd2QGgKyjbNeozq4u3QYQWQHBp5GE6P7whz80bcCL3xFyKJPP//znP9sfvgXf8X7SSSfNTj/99PZuo7mWF/dec801zcS6z33u0wDCdzAIjtsTn/jE2b3vfe9dNWhz8+H3ADKBD2KYtwIEZYqviWIVIABm8gBByG+++ebZD3/4wwYMKk+lqTyNpWE0HgDxPdf7GXAIAvwJnHDmORB4tQfXXHvttW3ug2se97jHtXtuuOGG9g5AYJYpvAS1dZni4E2hn3p1QC5gEMwr5AawJIMgRzII0SsYBMBMsY/n73vf+7YQXISU+QgrSSMwlfQ30PS8+J3f+OM+6JK/dMRgA8AFSGATQrhcA5iuu+662Y9+9KMFQPj+C1/4QnsOJhbXTuUlo06lPkelHsiCDAJIAIsvFaoMkgBBpqb2mr/3ve/dYm7i+9//fhNSBJZ3hBxQCBQbpq9h2I5r+Y7fefd7Gk4ZCPzZZ5/dmITfAeItt9zStAZhXZ73+c9/voENBsE027yOdg8gN8kgYwDBzMKaADCTBMjZZ5+9RVQJ1COsWUkaCovoiCeA0mwSHIKJe2QZnG6EnolBPjMpCEAI52JiASJ8EEw3GIQZ9c3raPcAyi5n0vmsyaqixT/FygAgKEvkYZIAuec977klAzAsyQIIOo3gnYYYltOkoiP8A0x2Ar8DIIQfZ5x3wIHJ9Y1vfKOZWGgMAEJHwSpQMgDhms3raPcAMsF46oMAkPRVkQ0BgmwIEORmaq/5iSeeuEXFdLL1KXCiEG4EG5DoVAEWrqXBCQ4iFbAA0S9TC2is8W5oFCb53ve+1wBCBxHF4nsYhM4kF4ukxSk6a1MbuCnXB9nQxGJciYJWgCBTyAAAgT0AySQBcsIJJzQGQfsj/PxRWTQ57zrczm1oWvmu4+6AAQ6AwjugwXSDefBB8EeIkH3nO99poGMmnajVV77ylZbACKOQ5bsByJTFf3ndnDOTQQBIZvRSQjKIABmaP1v+xP27ojEIxZs4xjvMgeDqRwASIzqCSXvRawSXPou/00m/+tWvFqG8n/3sZy0gQJkAhBl1/BKuId39jDPO2ABkZLw1Y6esRBIgzqYLEJiE32UQlCfm9tgE8/6J//KS5/e5z322qKyCjqbH7DF5jIHQp3BQNMMM+XoNjUXw849rydhl7oPv0SY//vGPW5lk88JUN954Y5s8xOQ688wzNwA5BgDBehAcuSakAsTMXq2V5SJ7sFfMTz755MYgaH5oDz8BgTf9OCfMEhh+NvJlpIv7Mpqlk49ZBTj4zZDyox/96LYuhPkXAERu1iMe8YgNQA5WBvb8acjMMoC4aEofBDNriovl5ieddNKWK7ustOFc/seXoBEJDhmDnk2gADKupTy+57MU+pOf/GR20003NQD+4Ac/aFEOFkyddtppbUUhjvv5558/O+usszYA2XORPfgCXROSKe9GS2GRNOmnvCZkfsopp2wZoTIFwHkNhb/6GU4mGhLmf30QvjMkzPd0BNoBxx2m4DMMwjoQJhAxqQAOKS6YXHw3Zfv64EXtaD4RBsFiMB+LYI0AcSLaCCfvU100NX/wgx/cGEQTCa1vGrvfyRgCwWuMYOmLmNXr/Im+CB3AZyJYvGCM3/zmN82cgjEADCbYOeecM8Ps2gDkaIIia23KuwDhfwM8rirsZfROreXz0047rc2DUHmAog/hRJ//Z/Qk/Q5nzfVjnFTE9xAgxrthDRw3GIOUdyJWmFkAhwlEwIKZNcUZ1akN3NTrg8Wgk46ZJUByVWEumsKymOJy68YgCLL+A5U0sZDPJiW62IWB0eRKxuA7yuHdFGZ+z9l4aJf5DtgCp5w5D8wq/JOvfe1rs4c//OHNUd8AZOriv7x+AEQTS4BkehKykgxC5HTSAEGYYQsE2hR3ZkMRaBx149iZbgIQzKdJc4xymIHXxjT8SxmYVt/85jcbQB7ykIc0xiDEC0AAzEUXXTTJGdXlIrG5InsAn0MGYekEylHFZ+DHyUJkCAaZ4nLr+UMf+tCt9Bl0zJ39RLj5zgxNGureRgKBhqYPo7OPVuA3gUIHArhvf/vbLWrFHAiMgbkFQB70oAe1ycIpzqg6+JsU+NUUAQBJBnFNCMrXJFgBghwhK5MEyOmnn74lKyiYNMzQruaU60JoeDJKLnxhRpQyvIZ7+J1ZeTZpQFNAt+Rj4Zi7Lv3Xv/5127iBa8jHmuomYtjPvjZm4DhQkJFkEAHCXa4jQjaQCdeEAJCpBWjmZ555ZmMQWcAVgwpACoUZu4Z5jW7ZQAQesHEPHQLQKA+gkO6OU87/3/3udxtImBNh9hznnXwsgASDTGkLGIMTdYXhbgFy3JkIWUkG4bPRUQGSDDLVlPf5WWed1cK8Lq/NNebuRmEYF1tSVsjJQJiD/C1mxREczDDCe64xAVBoCwDB75hYzHuQvIjPgaZh4wb8FgAyFWetgkPtthda7rgDBBCYrIjV4L4GBn14ByD85ZqQqWX0zh/1qEc1gBiBAhSABOFW+6PZEQqiTfzO9YBCwUfQMY/4gw1YgAWY+B3gmDZPZ1AmbEE+FoujAAhsA0AABhm9U7RFV7O8N1fZAzIIIHHjDzM0AI/RTmTCyeQpprwvAGLI1l1LXB/iDibajs6ICigaiGllejzON0DifkPHzG9wDdfSWddff30DEsADEIAOH4SOwgfZAOToA43xd28sxhyLwiUVrg3JFKepprzPzz///OaDKMwuiHLew0VR+iK+870z6jAHbICZxhwH2btOFOKAM7/BDiewDiFd1qDDGvocgI5FU4AUgBDRmOLrKKSaT6XfegChbs6x8dmFeOYATnGX9/kFF1zQZtIzjUTBl0Wc/fR/GueKQj7DDvgXmFKwB+YTvwMI/vyNDgBArP+AqfA5YBCuxcQCnPw/1c3jNgBZHX4CBBaRQVSqprxrqidAppbR2wCibehsuAAxUiPqDfkaxsU0QqhhAoSfSBWCj5nlvlrMbQAcGQpwkGpCJ+XeWJhYvAAI129eR7sHGF9NLJx0/oxeqWhqFjnyMLVd3htARDSOuLlVsor5VBldcOc8GmoODQ3DD6GRTAYCELQBwu5+u1zPHlgAiM5yZxOeCYPwHVGszdY/RxscWhi5gTUAQbEy1s6pIR+uA8E/zYV6U+mBBhAEM8OOgiRXCMoegIkwriFgw3U0FCZh0wXAAYgAFSaWIWQaja9BciJMQ9SKKBbvAIQyAchm65+piMfO64E8wSBpYikTlJop7y6/NfNi50/d+zvn5513XjOxjCzoSAGOTGM3u9f4tmtGCOPBHoCDP1LYiVjQMa4zdlWhAGHBFABBawAIwAVAKAvAYJZtXke7B5ApGESAwCAAxDVEmfKeAJnKHJi9Pz/33HPbklsaZL4+/2taOSlm2rsA8Z1wLcgnUoXm5w/h53vMK0BgKj3PwAdhFp1r6BgAgVOODwLzMLPOhOPt4XXcJwvd+kcnHctDU10GcbIQWTCjdy8mYvdKfuaPfvSjt3IrHxuAUJtSkisGuRZTCD9D04zGkbYOcwAsGso1RLf4bPybewkBY2YR/hUgAAngkOlL8iLLcI/bK1NVtMH9jv6dklDsVd97yhRyAYNUgGDKm48lQKa2iXUDCB3iAJnunkDhdxdCcZ0hPKNYNI4IFqYR39EZDD7zI7CDAKEcOomZdJIVYSUYA6ecbF5m4AEIG14fp5cmrGasALGNBkSOU5tpi7srGsXi//RlzQF0Nt2M3ikpizaTboUYOGfU3QvLQaUxCDTXuClcThYCElcDQq0AgRQU/BDDyNznqbYwiXtjASTWq7NnFmVgrh2nl5OtQybVcQWIOXkwCCa3a0Jcm26qkvlYbmI9pXys+TnnnNN2VuSlWaUjpabTWecaJwv1V/jNcN3DHvawRZoI2gL69GgtrgM4TCKyYIrOAnQAgsgXAOG3c889ty29PU4vJ1UTIJn4aH8fpzbTFg9h8iAmxl9ZUmm6XkjTnIDNpAAigzhg2sMyh2jXiafhDrhRCZAPW7DpHGzguhJ3N1EwAA1ZvGTzei++CysL+Y7oFhs3TH1nk3Vn1DWx7IdqQuw2dX6qwBIgmbDoEgmjoLmgbor5WI1BkiFSs/nZ8wjN8qVxmlwMrrlcXI/2J5LF91Ub0GFszoD/IUDYxQSfg9l1vidni40cpmSHKoDVd1hHsJONU6Cn2M69ApwbN+iDABT92QRITXmf0oK5bT5IHTjNKMwqGutciIIhMGAKWITfARMOuxOHSZdQLdEq/BDtUcCAaUaOFuFfAbKO8O3VgPbKkS18N1lTTbjOs2sky+DIcQWJANHE6gEk9+iVQaaUj9UYxEFmoBwsTSxDwNqMaWppjvFOSJf5C8woAIDJRbg2c2sI47InVgIEQMA6rDIEJHyGVQ4TIDlpmqxhX+ivrSPYCbQsJ/t8HbAdhWvduEGA8C6D2B+5aIoQL4p2UgDhhKkESLWvHUAXuQiUdLb4LCDQAh7cyC4ldICCRKo7IGAORAYBEG4ehx9CBAu/5DAdtcxNq4KYJug6QppzHz0zdp2yjsq1uXEDk4WG/42Q0icCxD163WFxHeWzn/0xByDVPrZyxqyrxssIFoJsXj/Jisx78B1MgtOeACGMixnFUQceDczWozjmOOhEt1i3TmTrMHc2STOqtn2ng1GZSPNqp+VN/T7am2tCCPMCEFNM7A9lx32yTFicDEAwsZwRrzaxYV9n0g1HOpnoPIibD+dEDx0Bm2hiYV4BEDQJADHkB2Pgh5DhiwNPRIvJwinR7NSFcYr1EwCuS5dBXGlKnZ13w7TKYxBSqR5225qTbpRK1Opn6IgKDHdgNNuX3929nURF2IPftOFdVQjVMlNOFIuy8UEECBEsTCo2knNvLPKzprYu4LAH6ig+n7HG3DbMa8q7USoBUjex5v/JMAjZvO5k0huENLN0TvM4BDePI10EPyQ1vzPEbAyHfyHzABA6jbJx5JkcdHdFImACZCqddBSFcwp1BgCVQVwTwtiiSFWwyJRrQqaUj9XWpLtCMCNWUqAdnUBxdSAAoFH4GjAIAHH7Us01KBVmILnRjOAECLPomFR8RwgYoLGqcGppz1MQuKNWh1xVqA+CMlZRAiBNKzcvxEmf0pnp8wsvvHALh1qnSsFOp9JJHRuWmzwgyLnunP91sAEcESs2aXAHPYAGGNwniQRHAIKPAkDc6YQyN6+j3QPIkJvH4YO4kC4DMGb0ojz1Zad0Zvr84osv3jK6YPSmNyyGd505R+BhEE+Rwv/APIJNMreL6BTZuzTasxATINzDYZ5oGACCBrn44osXy3SPtojsX+1NW9m/J+y+5AqQTHk3EgpAUIYwiCnvU8rHmj/jGc/YIrqEKdQDSI3Zm18F4nHuecEaAAQ2kB4pi2uY92ByEMEXVESxcN4omwlGUt6xVQES1wCQzcYNwwJa56p2L8r7UwL1JBgDMGQQAjUoVgHCu8uycxPrwwzzZ2/ML7vssi3yoHjl2vQcBCcLDfeaEu+uFG7vY/SBe83kZXEUWwEZ36YMzC46jRcmFU45timrCumwJzzhCYuNG46Cptwf8Tr6pfYA4qKpZQCZSj7W/FWvetXWDTfcsDg/rscihnkRbvcyggYBBtcLHPO1YBNMLX5n8o8IlgyCZgAgmFS8YArWpVMO69J5h0HICual/3P0xeV/cf9epsJxaNuQWe7OJow3LIK/a3RT5VcZZEpHQs9f8IIXLBjEwasg0acwLYAG8J0mlgPPdzCCS23RAvgb1113XQOLewALEO4DTDAI9wIQQAaD4JscJ4DQp/4ZCFHxHNd8LMbXZbcJENrr9j/0Qa5LR7b4m8pE8fzJT37yFqv7RLN5SAyiwKBBpgK4AMrcLM8KocGEeU038QgDKPWzn/1sEw5DwESsCPvyojM8NAeA0KGXXHLJYmcTyjfEfJQ1rUdH8G4eW4bOj+OcTwIE9gAkMIoZGk5I9wAylYni5qSzT5Wz47KBlXcQXT/M/4CDAdVnATxm82J6ubG1jGQGr6YYAAGUvGAWzwRx6x8A4s4mxwUgLjLLFZn27WFmLu+30tHEEiCeE5LJqC6aQqmiMKe0w+L8bW9729bHPvaxRmmpxdJsMpTrQPKbAw5rAA7+jFIBptzehQRFZsqNXgAOQEIZAAQTi3cAgvOOD0ImsCDUFNnvwdzP8u0z39O8Os4AwYIwiuUpx/SzUSr6Q4B4EBNm91QOUZq/5S1vacmKmEEZMcqUbzW/vzupyEInTCpNJycQ83quZX6DTkI74GPQUYR6eQadQ5iXTiHMC3DY4Z2sXtMRjpMACRD9EN+Po4lF21x2C4NgVrsmJBkEMDgXIoNMJZNi/qY3vWmxHoR9c92aRQdZX0RhxeQhQsVCJ511Jw9NZkzTATAAPhiKNBLAiJMOQNxdkZl0nHuARN4WJhc7NB5HgGS/JmMdV0cdheiCqUx5z3kOpwsESl0msZ/MvqzsxiCaU6CaOZFbbrllEUXwNzN+SSwkf0ofJVmjpsVzDXMblIkJ5rnr0C6Tk+SA0SnMpLOOHQbhewDCIqrjDhCjhZl5sGzAjtrvjHGaWGZtJEDcFccpBI8QnwKrzt/61rcudlZ0zgGnnbUZNMI9nQAFrGH4zUiEzr2xbanTPKxPf/rTjSmMbVMeQMFZw5yiPBZIYarBIKS945PwrOMKEFkk/byMGh41EIzVl7F30wZMLD57DLQAyF3eMbVgkKmkvDcnPe1hB4r5C0DCfATIpmFsx2PCorFsQ5YZuuQzmgP2INWE+/VTnFikAzDnuA62IE3lxhtvbHtj4ZO49Y/h5Clok70W3JxvOq4mFuOXAMEXYcw9g4Y+NeVdU0uATMH3bABxcKwQ6SHsX+XEHg3CLOL/5z73uYsIg/flOw1GM+JjXHvttYvOkHFSEPiMxmAVIf4JphjshcnFKkMnI4/DPMheg+uolAdA3JvXc2Nw3DNqasq7AMHEmkpG7/wd73hH80EU3E984hMtyoRQGsnKSUQa9pKXvGTbysFkIKM0pLizz5WOe0YtnEuho/BB6BCcdBw6HHjWqbOzCfccl3mQoyLQe11P5CF9EBgEZetcmSFfD9LBsmAeZCon3s7f9a53LY4/uPLKK1tiIUjW/k8Th8bCJmj8ZzzjGYvd350Q9B0/gsgVAi9AMhpG2Qi+m8fxPGkWwOCPABJ9oA2D7LXYHlx5KNlkEPfodVUqNUERmo9F2F8GcVupg6vtbZ80f/e7390Agr9B9AoNLv3lpJafXX3IZB4r/xIcfEY7YFqxCUOyRzXDXOar7+J5JIAFc4uluES2nFycgj16mAN1VJ8NQFyTromF7ylAkBnXhLioDoDAIlNIeZ+/5z3v2YI1MImoNGaPOfumlNAIvjOfCnMIQSbkS0qIICEyRVmf+9znGtMg3KbGJ4PwGYCkkwoABAnvdBIgYaberYSOqpDcnustQDCzYA/+kJMqFy6oc9HUVI6EbmHeq6++eiH8NIjwq/McRqQQaBdG0Ri0O78RfULje+wa689hIjW+qw6NQvm9eVw5s+y1pqpAu4SXASFAOY6RrOMOHsYXBhEgsAgASQZJEysBMoWM3rZgisgRlXRXRJbJUlHMJZPrAISpIYRgcaJIROMPDc91NOjjH//44oBPWUNb0hQVmYXfBYpskpONJkgCQnKzmGzcmFpHD1LubEIOnvlYma/HmKIM8T9MWESmMhR8WK2eX3rppVsIJQJKhYg8wSCaQVQewccxx7Fmozfi1GhztYJMwpyHqwI1u4xwUT4sxItOAIy8THrM3C9DwqawcD0MQh0AibujHIckxsMa+IN8rhs3JEAcW5Uo1on7Y2FeAZCaQHuQdfZZbR7EI51hg6uuuqoJPwKug4zwMplHdAlwUHHAwvUwgDHryy+/vK0a0xTK5EeF2YhUpte7Hl4WyXkZO9IYOf6P6dBGv3zPDt2YY4chTv1nmvKOeWU+FuPjslrGuJfRazT1MFsyf/vb394mCqFBfBHMKgRVAXayjsxd/lgia5jW6wASM+AJLgVUsNlIQacpxff6IbkmPn2WTGuhU92x0SiZG455zoSmGddtgHKY4vW/ZxO18hg2I1kVICYqAgoUrinvhz1+83e+851bIJycKbR/Ji7SOENt+CCEdRFCBTp9C+7HORcQtWGaXAg7n9H2giVDxbmiMWfdM9cr/ZRkJMOE2LMAGbbTlDt8Mbn91sCDXQGHAKE3dMIZZ+TKycJJAYR0d3wHfA9CswKESiuUCCGmzZOe9KTFQZ7pW8A+H/rQh9r99ZXmlmxh51h++is+P8upJlcvbUUw0+mYYICD6BpAmQJV337h8b81Ifqr+CEq4oxSuWkc37kmZAqbWM9f8YpXbDEHggPtJgwMpqkhCiOVZvY8Nx5WmElTJxM3NX4KRJ1MzAhGbzJI38X7aohY1qjgc8LJHVWos2cnHjZVbwDyx8Ye+iHOqTkuRq9qwuJhj9v8uc997hbCzSsnBjWfFHqE7pnPfOa29BIaiXmGc877spdpK/o3slB2wrIOSd8mnwdo3HjM9QT8D4MAkqnss7Ssj47j75VBcNSdFjBs73Lb9EFcP3SYfTJ//OMf33ZWdEsaK+y7AGFWm/SSdLphHVJKrrnmmqXzE/otgqOyTQ8YPTAkq+RnAG3iI4DgM8/CnuX/qSzhPMzBPqxnIyeYWDII71grThYyzppWuWgKXzKTXA+j/vMzzzxzsXm1C6YM8aYJw7JY12joSKMZrr/++ua/LNP8slOuJ0mw1WiX7FJ9kTTXvEanXS0EIFwOLEDcrugwOvn2/kxXFQIMfBD+BIjhf31HAaKZfOgAedCDHrRlajuCj6Aaacq0kKc85SntuGbnKjygkZnznnmV4JI9nBkdMpPSWe8BJAUtl6s6M0/nwhx0LqaVsXUCDFPZJeP2BhbG1FWFmFYCxEVTGdXENE4GmULK+/yBD3xgA0id+a5C/OxnP7uZKgom8yWkqJC523slI9BBRqxW9TdykrHn8CeYne2vYd4M924AcnjQVJkCDlkE6yPXhPCZ6CNKjXEDLJMAyKmnntoWTPlKYCjkVBYGoQFqBFiDrF18kGpe5f+mklTHvMcQlUF6Q2rkTAAZTNBJN5+HuvIHkxDu3Zw3cngAQUEyUagPAlBQsCkTfO4BZK+DKzUyuqxXGoNwETemaYWQG3Ui/4rUdoSM62gcjWXmHE3gq6f1LSOd/iHzacjEqvMk+kBONOrw66jnHsLuFcz7YduzywbjuP7usts0sdxeijFhfAGIp0u5ccNeb2Jd/dckhSEfeo4PolZWiLlRsNC4Jz/5yS0PCzMF4aRxrB9n/qNXcAo01+eMu05ZznVUB72WWRuW/oc+kyCho7FjTT+B/dz9cUpn3x1XMPTahQwxmSxASIbNPXqVNwHiTDqMspcp70MA8fldV+GUU05ZMIhozhAsn5/+9KcvzvdwAwfytlh9OBZlMiqWmruGd2Uv3/P3yhxck+FoweY9Jja6VSqAoJNhDwCOuZVK4PYkpIfZVhdNMYPuvswAhpcTxYwLwPBYDRSbTvte1b0nT8tYZC5A1OIKm1qcBjztaU9rgobgARDsSSYHc+Y9H2TUCs2RNuSQmdUL3SarZMMyodEZdYHirH+GfelwgMHCK/LJ9tqm3avBO87lMH4yiE66ByhlxoYAYc6KSOR+7NHbY5Ge0l7Ic/oganErzY1oX0wsl0jiczDvwfxH+hJ1TsO1H857VAFQqPP7XrCgMoygTHAkk/i9WxY5uw5APCJuKEJ2nIX0MNtGf7MmBAYxzAtA+D4B4o4mbtwASPYzI3tI3rZZRTAIwu32OmmuUAAZvKzmsyEABOecjeWGHBt3Y0whTp9Dm89nDTnnVtTfKVeA5Ix8MpPPBNCmv9PJLLRiwdVm6e7hQAWfQ4BgZpmwmJkbmMRpYh0EQIZkeMEg6YNURsB2ZKM4Z6URVMyrD3zgA9t2gq+CbFavwprlGhBI5zp/H/JF9D08gCYjWBUg/Oa6EdeOQNesbWenyI2ZdfAgIbDjDu8eoGTk1PGXQdz7YL/26F3HgpiffPLJi715U1C15y+77LLGFAgdgo95xZFqQ862Wj5Nq5yIrGxhhCt9mDp8guNIkVEAACAASURBVMqyrVs1rQSdzjosYkQL7eQhPwB+8zrYHsDySAbBF2E8M4CTAHHJwmFHHhtARJR0o21IhS+99NLFQZrMf5CYyBEFvRf3eZBn9TGy7PQrNLcyutQL81K261UEVc04rn4JTGHqAtRNpxPNAiibOZGDBYgJix6eBEDcGsqauCbE6KP5WIcZeZzf//73X6SapGBSKYTpqU996iK9BEfrgx/8YPMDKqhoJBrBRvcaVSNTsklGzryvrk9P/yOBkWZcAsRIFiwC0DPkywm6m5n1gwUIcqGJpaPuzprKnWtCEiCHvUdvY5AhNmCjBo4i0MQh9+pTn/rUtrmEtCNhGF76B7XcIYDIKJpG/K8fo6Y3ZSUZx44VGOnXJEAAifstEZUjmoWZNYWd+w5WTA/vaZnR61wIZpdjhxw5Rig0xofwPAA5TLafP+ABD2g+iC8n93jnOGb2yHXXEdadA5JqLnEv18se6Z8MRQkEXR0yM37RLrIUnWgdBIH+Ukbd/Cw4AIBrDlxtSKcTleN9k8B4cIDB6kgGYZK5MojLFWSQSQDkpJNOaiZWOugK/LOe9azFsWk0kOgVLJEAkRX0D2rkaihiIEBqLLoHEOsjWyXo0jH3+wSIm0Poj6CZ3A2SKMmyMN/BidDxfpITzPgeMAh/Mohj4KIpWEMGOciM3p6stpn01OZehJA973nPa/Y77ECDPvKRjzRKTFPJYQU41WkeM7H8LZ9Nuc5v0HlZYXd4TOc/fZec3LQcU05gCsO9DALAwFHH3JrCxgDHGxr/a51rQhIgyEwqVDN6DajgpB+UKVyjqwsLxShWvYCKsQYEIaNxrFv/+te/vvA/EMJcPKVpNhaNGvJ19EH0XwwpW74Mov+RvkeaWGl2ZbqJ2b0u4WQg6HxBsmGR/YcoCq6aWGMAMUVorzN6a0t7wEhrapGLxYWmkSMwmCFs84PAYyt6sI5CmgzAJBD31DmNarYNDUOyCM8z50vWsF4571EjXxU0OReieaXz58pD1okws75x1g8GIK5L10k3o1elivwACLN6YXg+72VGbw8g1cwfBEj6BUSwOAqNF4lmmFcKbD4EdqmnQPU08pizXitNh3gOCff53IxSJUB638sgrlozDZ4Ox8SCVWAQHMHNzPrBAIQsDEO8OOmuCakAMWkRlneb2f2oYS9QVP3btmAqmcMJOSJYRHv4n11PPvOZz9ymjvzmvr41urSsQeno12sRWEBhwmOu/xhikTS/nGk35YR3AeNiHDqe7F4GYQOQZaO1+98ZT49i00lnXi19EMbI5bawPcoLhbafG//JHtXUWihgkxUTTWhv9sDyWAP8j+9+97vb0ku4XiFOoa0m2E66VofbQ3Zcf55mnA1Iv6M67W5Qxzt/JjDSLoDBhCGDcJhx9p30z1G8hzHM3RVhEADimCo3OugCBEW23+H4MSZp8yBSnBdS6ec85zkNuYCF7F2iDxlB4looMgEhK9T3sQGtobU0l2CnnLWvM+hZbvVJkkX0R3KlIcDAz+J944PsP+QAiBtYm27C/7xy0ZRzIDK9i6b2M5CyFCAKlxciSACE/4k04H/U1A+AowlUGaTnnNcGSml8n59To1C+8ysJnKTlOrQZ1dK0SofddAaAQWYvjvp+a6j9F7/pP6GuKsTMctGUAGHsegDZ6ZqQ3rxGr6d6AFlYJk4UIkRGssjBeuITn9hAARV+8pOfXJghCiDskaZPmjyrAIRruhMzt0bD+M2TcL2u538MmVjp+AEUzCv/TKemnfghmx3g9x9gjGGuKkSuXDSVAHEvAcbEVYU7mavqRaaGWpkAUWEvrKD73e9+CxOLAhB6zih/5CMf2QT4m9/85uzGG29czDib9qFznmAYmgMZi2DV3zI3B4DAILkHVppv1edI9sjsAFNO0EQuokJT4YMAkk36+8EAJFcVumiKsU0T19WEaWKh0NYxsarjvczkrw76NtMdBknUcDHzH5gevFj7QRQrgYDQujZ8CCCp2XtmkAzS+w2NL4MMZfEmOLIMzar0V7RznVF35RptBCDYuZvX/vYA45mrCmEQJg7rvgXJIG7csO6akGoyjQGkF73aBhAYhIs0XxB+NmlwBxD8D+PVMkwmEmZhqzBIaoKh0JrgMYO3rkMXfEPRp4xe6btwD/XzJCPDvPghnrm4vyJy+y7doI6LpgCIu7zn4jo3IDfcy9isu8v7qNMdPu+Y/DlacxhEE0bBfOxjH9vMD4SL9R/6ALybVVud9mSSReG3ZgmvQ48ZUfNZCZCeWZWiZ11z7qMeOexGDsyiswx3s4DqYMDrslvnQQAIYytAGDv3VtZZh0XWXRNSTawqmwmMDBCl1aMczWGQqtXPO++8tk0OlEiKSSYC5ilUFQi1ItVx7w1DjWJZRoJxCCAZ2co61olFnXMTIXk3zk47MbP2M53hYMRv+k8RIHVVYU7UorxcSehpt701IcsiVGN+hQzTM8VU0AsfFgaxa0XwhRde2HKUOHPwi1/84sL8cuOEZRS2DDhDQMn7fJY7pGgiJYMIbBtjWkntHE0rQJAZvjjnmFgAZHN+yP4CjDFhysCERUwsl92miWW2NWNjJCsBkgq1J2cpy0MtUra0nBJsqXSbrLHkNikJ04p9eKngZz/72dlPf/rT9hwudtJOXyQrMOQI9b7vob+aYVyTO5kIkN6ci/VzviPnSQSUaSc1cRHzCpAwCOuYgvsrTsevdMbTk6ZgEAGCP1sBAnMMAaT2zLIIVTW/Ve4JkpyuSNlpsgZAFHi0NWeAYGJBdTjoxK6tRCYrmr+1CkgU7oruocYJ2B5AkkEyKLAMJDKHvklGsjaO+t4DsirBChAzegFILtH2GAQzej2pOE3oyhyrmPLeo9ymhVL96cwYaakmogoAMHF2/vnnN2eJk2stsDo2acf1KrwMOKvYkLKIPggdkR2VDck62OEJJtelm5flYZGkVOOHbDaU21uQ9HwATCyPQchVhfqG1MBFUzJInhNSZaaG+le1AJI9DAT1nPWmdGEQCna+AUFhkhAkX3nllYtJnGSP6uTUig397/e1MnVo0uQz1Gvn9MynfJ42ZGolgQUo+BMspp0AEEytTU7W/oIkzyrExMLUwuzKsUqA5EE6fJ9y4+dt2h6fIfZXGPNBMgjUm9NbWDesKEQIDbfBIDitVPzLX/5yE5qeU94zsXqsoemT78uGIQGYgYEhP6RSLP+7tj19FqNZ/OZWQM6oA5DNOYbLRma93yuLABDXhGhiEdlKBgEsHn7kRnL8nwBJa2HM5B6rrYq3ylc1+xdOOhfiqKJNMTu+853vtBl0owZ5Y2WQVZzu3TpTqT3M1K0dlf/XbF7/d05EH4Q2oxSYVd/kZK0HgGVXDwHEdekwiKsKZW9XFQIKc+Zcdtsz21IBVp90rH7pVvTKXciSYV4YAwedKBaVI8WE3BkLSi2dTnRWYsx0WhUgPfDpi6Qjrqk1Zs7xmz6HC6Z8d0M5Oh+A8Ee7V6HoZYJxGL9nv1Xb/DDqwzPTVOZ/GMSERRnERVOZsFgZBD8ExVYFWXN6N+2tPnYlgjZRSOWZACRJ0TPGmSCsgpnCkyZWD4E9QVsl2lABYoQhn2HH9EAi4wkmw7umn2Q0S0fdUC/MedQAYn/leFTBOUyAJEgw4ytA+N/wvGOG0gIkzqZ70tR+ACQJoOcizO973/sunHRSTKgcN11xxRWt4nR80pgCqOD6buE9c2vMFOppmuqDVJZKjWFSYm9+xLrmikInCzW1+J+8M45GOIopJ0PxfPsogxqHAZSUD0+7zZOm8Ek0f62zR7ClD4Iyq0qyMscqCnjdPmgA4cFEdDgLBMHBNrzhhhtaWQq8AlhpU2FOQVcT5P1DIElg5efKJJaZZlx10LKDMpHRATDdXTNLVmFAPBqBgThKL53N3HkyQ+FjTuyYSbxXfZAWAHWsZxXmUWzW1egV726ywdhVgCgTY2b2btvRTCyoj8gVE4Q87Fvf+lbbYrRu1mZFKigqaBIgtYLVF8my0jyqALHz7PB0yCrD5fP9zXQTwOAmAKamEL1i+S0BiqMWyaoAqUya/V3ZJCfIxsZsN0KW44ic1TUhuezWuvYYJFOBxszgnBUfY5RVlcP83ve+9xZAYHKQXUx4ADuYUPExgFTTKNHdsxWrfdfzW6oplcDTlDLdJQHSMydq+VxveJfOBggAxc0cUBDMqE89J6uasPoedUumnhClsqiK6SAAQh0BSB4HnWcVOqZGrzKjNxdNpSJVDqvSHopu9ZT5EBO17wEInexJttiJH/3oR7flXVlx38fMrGpqpWm1jibKBnOfZpH7ZdWQniDJSacKWp1BOtud+6BugEJwgkjW1I9FGGLcIVO1x+D2VTVX1xmfda4VxJVBMOVRxPyecyE15d3s3p4s2R91Xi6VZrbXNlffOdkmlcv8Xve61xZCxSIp7D3i0h/72McW4d1qylQtXxFchXLbw25drGKUpYKgDrJlKdgIMukKuW1+vUd/Qw1SAZs0DiBw0LV1AQl9MEbh6wjGflyrr6HSyIGtrFmFIQGR/bOb9maZld1ybJyMRr5gEOdCYJAKkFxVaMo7Y6Qspqnfkz9/T8Uu61DHDDD12p5m6fzEE0/cQqMSwWKyjNOjyOL1wTkAVWsnk1SKGxOOnQDEk6KIpdO5llHrJF1qb2ua+X36MESt3BuLATgqAEnTd1mUqqdh7bsxG31VcK9iy1sH2B+AAArPKXTZbTIIkUWTFFFY9aSpnlCnr5Mmk21NIGXgYMjUt2/m97jHPbbQomw1ig1O9OpHP/rRth3cKyITjamhK0h6GsXvjLQkouugJIMowHQyKfgISQVJNnbRwNgxPrUmz3IW3R0W3clvNxp1VcHa6XXJIGNKojI9fWOf8VsvLL5unaq5N9ZvBhNyXTomlqsKDZhQBz4LEE1hGYRn9szrakn0TKZU6Mvm8RYgO+GEE7ZOO+20FsUCIB//+MebGZOCnwARHBUYVrA3sVcHizIyDNu7J4Wdaz2llkEmDcY6KiQZ2hwCSmb5UidYyQ3kYJOjwCDOezgmQ+vyq7BnH1eFty4wUhhX9WMEqACRQeqyW8p20ZTnhJjRW00shXio/j3rIplmmdXTQIaJ9bCHPaw5qFQE/4OCq3ZI2qpoTYGsVDfGCun0V3QLRN6hX8y/hz/84U27fOUrX2lzNfkSdGlypBapbGa5JisSwSPUexQWThnKHBOQHD/7SWDYF7tlyipgydo9oUW55bp0TOXeqkLGWFAY8s2DdFYxDYeuqQBJRV8/t/5lHgQGIc2CBnzuc59bbOZsYXZkpS2uF0yVUTJK4Gx8XlMpvldxOxmAwG7nnHNOo16WAbNXcAI1ByfDmUPOqFQtnZOHhqKAUXYrODvVyOvct8z2H4vSrPOcoWt9fj6nJyd5P9e67NZ16TDIUMq76Sbu8l4nQKuirgqjgiSVcLVqhtikHeIJQEAstIf5kgIyZK70KjcGknp9CrTPG7ILEXIm8Vgrj5ZnM22A3GtUHaTqrGtmJV1D6ZiYABAg9qh5L4RqL8rI8RhjkOzLZZp9J/VKgPTMrMrYygYAwUkHIDKIp5Nl1Al5FCB+Zpx67FfZsrY33YIeS6RsJojas84444wtzAtMjZtvvnn2k5/8ZNsu7j1NJJLrbxUgvf/rYKSGHwMIAnzxxRe3jOPvf//7bbcVN8/umRMKTwLG5baZ0etnqPwRj3hEK3/K6SbrAmSv/I06bj1TekyxJkByTQgMwjg6NlzXS3mv54T0zHPrWC0dn50m5jJmXID+3HPP3SJRj9gzR6y5i2KloCH6rANWaSz/r0hOIea3ofAbnYEPwo6PmEGEopnM1A8ZA0hqWdvgYKCRXGUIQGBSlMXUd1pcZl5lf+S47YQpVhWk3nW9ccGcIv9KJx0WwXFPgFBn5z+QSyNajNeqgO+BpCd/VX5txyIN55JLLtliLoCHY9d/73vfa4JKhaUzG5qmR+9hPbOrdlJWKOky0V3v4bl0EgA5++yzGzDYUOLnP//5bczB1GJDnUQ9Nb3wQTyTAkXhEdF7KUwHWdaQubEfdajyMcQyanCud02I5hVjSfqJTO7Y5DkhJiy6d9kqk5xjYz8kp5UUWvue/exnb1EZHGEE7vOf//xi2h8nnO97jli1f5cxRTXHEihVy/FbXk/nYQKy4zxrVtA4H/7wh1tCpR2a9Fqptvo7goPv+YyWIkiB/wFIjvIGDqs458sYaC/AJFDTbOazAMkDPXuLpvKkKbcBMsm057/WOleApOKsQBDA+f2CQZ7//OdvkfuCoLCQ/tOf/nRLfc9OrDRk5KoXweo9vIfY3kAm6BIkAMTZfmb86WRMrJtuuqkVrSbLZyfbpfOXcyF8dtEUgwAwXBcyRUe9p1SqYNT5jsNsh3M2yWq5qhD/A1MLhYcA56pCAWLaiT5ImlhjbUuAKFc9kFSLJmW1ydULX/jCLaiLh/3qV79qmbyaHSK+lyk65JCNASSFueerZONTAwkQNrS75JJL2iPYcYVNJXoAqdojI1Y1BEzb6XzCu7xjbsIk+3VuYQ/Mq2jsntnZu69OuqY5sspz9vIalVyyiKsKZRAAAoPwyl1lzOjNRVMepCPz9/yrVOzV3B5rWyWBBYO8+MUv3nJnOypLHhY/6hDRoKS09BtWYYuK2rRbFW4HPwGiaecJupiBZ555ZvND+I16Euqt5l/PB0mTqoLHbWYECOBg0nQ/1oWswgBDg5gKowpIHYdkX9t7GExinXMxF+OZCYtm9HJtKiXPCREgnkyc7aksMWRNpGUy1r/+to2FX/rSly725iX8BoPwYGdreyi1YtWWrSjsVXjIdEsNyWCam0OHUhecdFb9cfouYPnSl740u/rqq1tafn1lx1V/Q+Hye9eD4IO4qwsRM9hkP167sf9z/ybrX+uYQErBSCbZKYut2x8JENtNG0w3yYzeCpA8BkEnPY9BGGp/VRY9EKUZ1bOEts0hARAuooLEoz/1qU8tZsf9vieAfpfX1I6vbJHXWrEEVbIBgqsvJEDQ7BdddFFzqIm4kTdGZ/c0c9WYqXkygoUPwnOMmjDfQl7Wfqa971RAtekV/J75lABJMA6ZWj27fF0gDF3veGa9+Wy6iQDB3OL7oV3e3cQ6AZJZ2ssYomfFVJlRNu2/hVXz6le/enFOOg4UQsfDZZAsKM0rPudkTaLSCvcYZZkJkcBzF0Qqj8C6sTYans7FUWdiM+8ZYjzrlEABhFC5u2i4BZBssp/C0zNPlz0vnd5kwtr3mlgLO/rWaF0tf0y77gVI1MRVCQIQZ9OdUfekKeuYCYvmY+G4O0k9lHai1ZIy0WPZ/C77xT7T756/4Q1vaADRIWd+oTJHjyWMYPWYIDVkj1V6A9obEATYiTyEF+1OWj5MQgOuv/765ofk3r0VCNUGTwDRyQCEAQAU/MEemHM7PVl1HcGq2l6tOAQUrtfMEiBVyLPMZOQ0SSqzrFPnVa+tmji1fDKIR7GhnN0Nk2sFiBv8uSbEPqoMsmq9eiZY/U4F02T3jW98Y1uTTmfyzobVvUIqG6Sg2RnJHL1BrmVkJ/au57vc4I08LNJBAAgv1oVwAi/zNzno/KZJoSDV7/weAAI+wOGhnjiENY1cYdtLZ1cNm5p+bOBT+Cvwc8xUeJZfwZR9tV8skmaVdbPvAAghXv48io11PgaLuN5d3lFeeU5I7sC4jHF3Cppt/fz617++bfszBJBKWZW67OBtjk0sre2hM+29sUZwHR2C7YkQAxBS3gEIgoTWASCcwlsp03rV95wT4bMbWDMH4mE6vVQTFxvtVqCqkqj9tiwsu7CNRzZqdizrtb2y9xLwaRlkuxIg1Il0E/wOAYKZVQHCuDMOMogJi/opY/20rI+qMu2ZYLL1/HWve107BloWccOGBMaQL5HCMuZv5G9+1sdZBhCAgBATVcL8ASAAhY6iztdcc81iD69qXvXMrQQIv8sggG4MIKnld6O56uBU9l2l7GUDLEBSSDWxNI3tm70CSLaDsivwZXDePUgHP1IGMaPXFCfD77AHCtKUd6cfhhSVfdPMowElskr/SRpzGUQNCUBoQNX8PUGWCaxI7aSef5JaZtkzuJ8OczIP55yEQlLf3WgaH+Taa6/dNh+SwMiJwRSKNFFgJ8BHGBk/h8HoaRXv3wl17+U9Dv5QmQkQFVGGu7MdewGQaiqqXFM++E6zFfnKc0JgkJryzrUoRQHicmgzrSuD9JRwysE6/Z/mYQNIfsGKQgHiQPR8h/RB1A5q2RzAoXuz7CGTSxMLbYLQagaRUMj/lMEmd5hZpisMsUbP1BKA5mIBEP56x0Iv0zrrDMB+X5sAUfHlOpgcn70wGTVH6lgnG6YflOeEuHDKlPdkeBQXfx64minvPYD0rJjKyMsYWiW/sBgwsfySh8IgoDkFIs2hKigVKMkiPaBkIyrDCBQFKBnEQ+XR9KS8m1D4gx/8oIWmsWd7AyJ4NS2q826kjIGAmc4444zFqsIsz3ZVgdpL4FSlsVMgqfDqxGIvALBbgGRAQOboae4ECFHHTFYkgwOA5DWMk2vS8UM0scxw6I1DDyA91h8CiWOcMjx/zWtes5gHoQPHNm2oNFbBkQJegaAmG2rEEPrpqIyJE21CiDGFEG46lzr/+Mc/bvJUmSLBlmYGn93U2h0XDQLwjIxijbGg5e/EVLHcofLXFd4EGP09BhCvXfcZPdMzd1pJhZGCmGFmrmceRCfdfCwVokrNnRVNXMzw+yoASQWdclBBk+NQgwvzV73qVQ0gPpAkwJydrlo97Us/p1b2YRmDTzu4gmwIMCl4+iBOGCHImEI475iD1Pkb3/jGgkESJFWbaWq4/gBwOGsPg8BO+DpDTJFaMoVlGUB6TFM1VmWs7Nd12GQoilVBX/spn7EqM3Kdz6sMUpWTDCFAnEnHUSdhsQcQD/PEggAgbg3bA3bKXM9S6YEkxyBdhIWcAxALY0CuuuqqtuKrNran5RKJNt77eg8bEqIxkMggrgmggxBgV/7R2Rz284UvfOE2+WPWLwXNjkVYAId/gA3gARDMuDEariBZpoW3UfatkZUuncf5eqm0loV+q2BTtuxBORnBoq41IlfbmvWtY9xjEM2sMRMnx6ACpMcg1MlERU0sQOIevVWWss69/s5690znZI5tLPja1752cQw0QkPYFMcp6XpIe1UtkwPpA73GxVe9spZ1LAzi9qAmsemHUB7rQkhchPl6WisF2M+aWC67xbYlzJsMMqa1V9WwlFGDFw6u2rdnljjIWfdlLJXPMsmT77hP5vSZVXn0QFaFakhpaGJVrZ2KN9thyrth3lwTkikkZvRqYpnRmxkHPYukxx5Z9wqQDFIlCzV5fvOb37w4xJMHk6zIupAcoFXpPYUvAaJGcxZU8FluDyBeo4Z3voLOouMI9yLQlMkmDkSyCB1WH8TO8D2jJGbyAjrKZS6ETRt472nV1Kar9okCmVpbRWK/WNZYZKbWf6h+gkQG4RkJkDo/kcw/Nh5jjJqMVc2YBKK/MSlomNcolqsKK0ByZ5PKIEPm/9DYVFlIa6cq9IUc4aQTdoO6uAgGAdF0sDHndPaWaVU73Mr74GSQqn17/ydAPBXKRTQItMtjqSNbFbHLCdG3njlVBdA6ar5RLn8AA9ONlJOqratZsipA0j6vwpIMUoGdwlq1X09Yk/EVWPue6937dhUGqWwyBA4FrCqB7G/bnGUAEJx016VrYglk73c1YTJITXlfZRyqQrYukkAFR4J8Trq7x67he5AAiNPEy5AaBdV1F2MmRjKJ4OL+pPkea1jxDCvrRBtpMv1AP8TtigCIx3mlsNUBSnBQH5fc6tvATKayZOdX6l1lYNTmt4mMRCpO1ei1vjtx1AWlZWtOpsbkc0b1Vm1P77p8nvXnPcPKKZQeB53nhBgYymW3jA3jbT4Wk4X6IGmyVQBkHbK+WYdUQHV8tgGEdHe+ANVEhNi8GtqjMDS1WZa9hUljnao20L6jfDWZ4KggsdGprdV8sIgpJwCazkKYoWBMwssvv7wxX9XSQwJn/SpAYBAAkss/FfSqGVcRqiHtpPZKU9aBTnNqFYD0GNiDhixTMKQw7BVADClXJaJCrBpbBvEYBHc2oa4JEMP7uaoQsMjuQ8xWFWRlxASH/d8by1bOy172ssUhnlzEOm/2xqKxzigzieM8xipCkUJKY9QwLp+ttmNqA7WcZdjJhmJzQ2MAApPQ0Uxwsl9W2pnLPlM3j1Vwp3fCxz2ACJJVHOXegKQySGrPwbLtOcC2f6zfexoUIUzwadtrDsmkNWt51fHNejOuORci8FRuWSayoA+SDOKR42llyCAmq8omQwBJxcIzc6xSIdnPCY5qxnr//EUvetEiWZGLvv3tby/OJ6SBmDAuqh+zRYcQKM1qF7sQZcxES62vsFCOPoibLDBh6JappMj88pe/3OakZyelFktHXdONMgGGoKsMsq7g1OuTNVUQvUGz7VXJrAMQTeLsY5MAK4Pstp2U1wNIKrYhgDCbDnvIIPqpjk9Nede8TlCnck3F0lO6KocERiqXdA0WMogPkhqes0GICmka7ZaGeWjaotXkSH8jOzIbaGcDEFJMXNyEOcR3+EwwCOtC0iTpafvaiQk8ZucpE1ZaVXBSS6cCGVIA1aysFN9TQmOsleV5r0KbJqFlrJJ+sqoyUOn5vGyz7JH9qIDKIOmoeyZmso4p77C7s+ru4UZZ2S89cGRfKncpf2nKKzeCb8FSbtog9bEIiXmFNIPqwPvbKowilfcoT7MltSsVS1vcjkCbmFQISBBiZr7pODQQ6SaA24b6Xge7diTXub0l0SsYhIlCBmcZy1UGqFor2aCaUr3/6/2rRM6qmaAQ9vwBBboK8tA49sCX9VaJ9gCJoPnnPSpiT5pyTQimFmABvGlSMgb4mwJEEwtZGAJIlTPlKfvFPqsA0S/dxkovf/nL2xmFOlpoqI34lQAAFKhJREFUY3YMGTIR0lRZBSBpLqV2T1CkTTikQTOKBThgEQBCB9K5RLHYfDtp0s89Gk2g6PwDECcKHYTeQKSQVAEdAmS2MQXGzyqSqozspyEWcZBl4goCB11Bqb7CkI/jc4cYXuWWM/b2lW1Jf4LrM6LpUWyChDEEOOnY8zkTFk1/7y2ayn7Lsc1+TxappqZWTk5CNtllHiQbS6iXrX8q9Stk1URYFyQ5ETQkaNXUQpPQKQoyACGAQGoIWgUfCYB4ZohmXTqmKYjW2Y4kWsJAYGKx91ZlkGSCquV7/ZHMoomabKlQ571pyqaplGZSz/RJLZ7A43vLzDo4w247eo50BXMqmAROtilZybKraa1QUgePQUiAEDFN1kmA6KgDkgqQ7K9t2r+k9djvaWYK6gqQhby88pWvXGTzciOVJ22jB4gqDCl0OXjZofWaXmzcAcn3ZB6zbt2ehxAvDIJA85ko2xVXXNEmDL0PoeC+ZJFqMsloXAdAmHxkxSImnAxiedn21DI9M0Q6T41KPRTmTM0QzEnvqThWAYjsb/+l6SAAxhikRrJSOVZFqXldQe6YV+VTlaBmloum9EMAigfppB8gg2Qky02s03yvspNKrVeHNEEdA94z26O1CRPLTrCjmU1PJ72aESkU1QTpabkESZpZdrbmQ1bae9QoCKxzFoCCP1f/0bEkWeI7aRLYeQpIj+kUdMrOo9gESJqTyQrcN1ZuXpt0LzByjiJNoJwDsIxqLlRFZJmOVwWsJgvvCVAFyP51DMbAkc+uY5VKsY5rlmkdnCxMPwRFRx+klSFAnFXHYnATa+qTpmc1B3uKWuVV668sUJ5M1+5/xStesQCIP8AgxtF7glWZZB0zKwemakfLTU0ve2TWrRtN4zNgalFXQC1AciA1L2STClA6Rv8G0wqzDXbKsyhSM9NH3MPvPftdpqhKRXOkTqolkB2knrkyNA6CLXOvUptbRxlEDa4wJdir4huyGKoJVvu7KskKOp6dm1iTcgJQAIjMr5wYveptYq3m93npV2QdUtHx/bLUqSynAcTBs2PRxmjlXgepHXoVGGOPZJEKkp5dn3asSYW8oz3QKjCIZ5zTIPwmlt/aFp+RJkza+RntcpY+AZJ7NCVA6JMEbXWeHYwcBPtM7ZUmkVrQetrnvbpWs8Fyeho6+8+yuE4z2rFOhklTpIKgmk7JkqnokonGBFcTy9l0T5pKgHB/NbFQjpjaKUMJfuudcpByWcGadfRelU57BptXZ+MZfBYggWY7sVLVEIMMXd8DTg5gBYjXS7cKpJobrYKWx1kHKHzP5g1f+9rXth0qarkOmqBQKDVvDCEbOqbsHkDs3GSQBGIKcAVIgkxHOc0o703TVnZL9pAJ01yqSsvJWMpMBvGe3GhPu9u+ShbP+qWMKJApbD5riOlquXmQjiBx2W3OneQxCC6Yk91rhC5Bm2ZSzzJJZZD3pcnaxuSiiy7aYoKNiRo6zoMSK+ry/zog2SkJnmWmV4JEoVVQbLwg0VZ2dh8/QWcdjUJomsN/HKiqbS1fkyad4p6JNTRRqKavjrptsc0OkM9To6Vg58Co3RMgKgYBrjCn1jMFKPtagFQlVJ9hnwi6LLeaK9nuFC4/J+ONaWzbnD6IWb31nBDKMQ+Ld/dPzp1NlIseS6dfloGLBLuKy3ppgqrg5ne+850Xu7vbMAQmQ6QWOGaTVpZYBo4EQvoFDlo6j2pzrtOhBiA4bLwDECJYbP9jJCTrkwyic60vwXNcD+IpUwAvT1StDFojTvaLQmSnV9BoYvnuoDk4KCjqj/DwDARBH8H2VEdecyCjgwlOAep4ZATNMRAgaQL6ORVLjklVhHUMeyDxHuqH30h43nwszyrkmmRvF8jhg+iP5DkhGSzJ8k1/STM0ZS4VV4JEUC0AVQFiBTPcNcQQFRSpWZKyh8CSJlB2sAKoeUBdqBffI7huFco7AEG7MAcCQFwTkkKboPOwIH93foXOBxiEegFKzg+k9hEsqXXz9xRU29frp2qe8D/AACAGSEz1T9Owhq5rTL/H7nl/OvMKjHUWPBlISBZSQeV4VpYak4k0dRIgMgiAoS+zb537cs0OPghgsQ41CCGwAUgFiQpMcFTmTAXmOC8YJDWCNnalUjrI6IcDPCb8VUh7LJMmTzV/pG0a4nPtMDcScyE/Z6eTqs916Shm/QSYcXTqo/9huokAyVCiAEhm6GnsNDMqewwJTn6PYAqQZLhkjQrMOpPdU1JpDt5GQ8bO7wJD4bK9AkyTLxVbAkTAjYHEMnkGgMiERSapBYhlMQ6AYgggySCWbSAChSNbKYupfDXfU5lbhs+f3+lOd2omVppR1TkUTeuYWNUsqUDK/zMGnY5XtS+pp4KMeeWxBTQUJ90cMhueGiFNFDpd7WxkjO+cW4FB+L8XHbFdGZJVWaTpNcYeY2BxcAVl9kGvzHS80zlfDPCtAFDTUtdkkSxTjZvvlJPjQ7+pgLJuQz5bNbX8nzoAkDwGgc8qBuvF81xqa6jXRVPWTXfAsq0/AOFzTllQ94xCJgNVHLT/ez4IlTNSkIJeAVJBUP+3wmMskzSf6OaeaubwO52DAMMcbgfEtRw+arJiajqFN+vO73S25494xIIAMZ1BwVAIewySppJ1th8UpFXYIzV/Zechc9XnpDmRz0rtriDwe53Jr4KFQPXCwfpDCRjHqArpEDCUBfrUk6ZMeQcgtCVZ0pT3ZBCX3dJ+QZrPS4DQDtqjZWEblJH0q3rjdRuA2OlGCpJZKn3XThgCQh20+n9qXhugvagWtzOIZBCOhT34jf/pBPyPXA9SWTAdYso2ciVQ8EHMEnbVmjk/GRVKqk7A8FkTq35eByA7uVYzorfqUwFIgBipSROYz1WwDACk4pJBUsNn2b36D5naCRBWg2Ju0ddpviLIbtyQEa0MvKT/qtUAKAynZ9AizXbZpLLINvmUQVLD0ngnY2onVqEYGtChTqHsyjQ5AIloK66Aqk0QZB01Og8qZW8sMpHTPvb+BK71ouNpI+XY8ZTLnycZcd8i3HerqZL9lG1McFiHVcyOnQCi3oMAyCJ1HO2DKsTJitQ3y9A0sd+1JnJsVAKas2Ns2ZMFvjNhEXDAIkS0aEcPIDKIi6bGACLYbWNleQFltKzHQgvrBx+kp/kNpaWDOgYGNf0qrJI0WzVRHVABRfkuwXRyUAbhmcyBMJ8j1dsJ2ZFp8nGdy22NsQsQQMfApz+g+aSC6DFSZcZlmrXXn1XbrQKg1P7ez32ycPoK1ZTzumQhAgUqBrVsClOOSbL/KnXNawSIJhYAMaM3/RzXhBigcdEUZaW5Z70ERPpaVXFUq2XQDej5IDx4FYDUQq1EViaFsteBNqrahkmbdoQbiSHAmlxGOIhguR6kp82tq++Gd+lsY+yuVERLKRBSNfdZJ+qTGjgpOv2HGkZcRYAsN9uwyn0Z0kwzME2sWk5lQx1aAGLUUFO1zjd4b4+lV6kv1wAGkxVhEcK9zgGlYhMgjj9jlinvVVZSDm2HY1blcZkS2+aDKKwUklEcTaKkynxwmk1ZuSyvfq6dqKZiIBROhdLB8bQhND7P0T4lh4owL7PpKciyUwUHz8r5D+kbZsL5FyCyUZpZalyerwlSbdiMxKwqLFWzj5ksvTIN0QJoX9XGzvuq2SMLcb9RH0GKieUYqABk0HWBnHWoxyDAIIBT5rOv3Z/X3TX5Xx9ZBukxQM+0q8zPM8b6uhvF4ia9/B4bVB/C/61kvadeP8QkaqvqCFIXBklNL7vRMA+/ASDkYqUPwnNT6/ubbGX6PGVQpmeQwEppbycr2Jl8l0Ji2bRtlfauC5xl1/f8kCGAVJvcOmtSZlDCLOoc29r2dcFsW3L7HxgEgGB2VYC4L5YA8ZyQyurL+sjfq9uQY1fL2DZRmEyglh0SetFdBaIHqGUV9xkKbgJERkmTyFRz7qPT+B/24Ejo6ntk4+1Qn+MBoc7OYmKZ45Xt26kALGv3Xv1un2e4VyGrjrXj1QOJ4d86ByOT1nvtz522IwGik27Cos/kGa5JN9UEhWaQZt2xsd0pp2sBJG00aaxnYiV99RhllU6rtCgoMzIieyDMsgjaHsDwXMwjOpX9vJiJTYBU00o6FXQCxNl4wIG5xgAcxZeOto66jmj1haqZpDJIB5/vhqKAKVzrCmj2K4D2nJCasJgAkTlyTcgYQKqZn0o+I1tJCKkQs46DJhYXmW5RAWJhFSTbCr51K//KKFnZHkAUXgfVVBATKKkTnaOTxmd2VuR8EDSSNnH1P6ybQsP97hpv2grgYG+sTEU5SkBxfiMFPSNYQ2aSglIFq+fAVvNktwAhi9x0dxMW6fMMkafvifLKTayrDCUzpnzaJ6kc8vdqaSx+GwrzUsma2DckLD0zbMw0S5aqoMoUEAbIxUyaVQJGAMEmnC5FNi+dIAAEcQ+ECk0u4fWcdFhkJ/MXKVz5OetB3fbTP6HsNJPSH0tnuscgdWxrZMjf9xogsH4FCPXLMTAMn8tuAU3PNEr/yHGwzrJHOurJHCkrC+ujAiRRpdOs7dkDSNVK9YFjPkkVXu3mZBEBARB0Oo2qcB1CzkZ3t9xyS6teMkiPNtPs0MRCI8EeJCp69uGQMsj2pD2bnzPq5SBWcyU1XbLbbjSywpGCoKDXaE9PkKoW7QlgnWfZTX3pJwDieYUwCP9XgAAMT7vFX3SycAggORb0bQJkbG4kx2GhxMcYhArUtdkVLNLzTkyRHkD4DlC4FkLn3Pyb9E+oG7/DHuwnnMJY/Y/8P510tRLpKw95yENanletl52abayM0ev4LEdwpzmjkKY5KIDXFbwUirSzU2kIlgR5MkIVuKpR00zht4wQ7mT8Kc81IbIIJhf1y8AAytHTbjWxzHboPXdIcWW/VBBVq2aQQQSAF+R8SK3MGDt4LddoWtT7u5R2a5IizxUMCLGOeU4Q8T3lsxYd7eOgVfPAgbcumlgySG5cXQGiXa9plO9qpwTQUJ9YN9qUmj77ic+Cd9kEVm8s0nRKhqqBiwRpHe9lgm65ab4tu2eMjU15d+EUAHEeyftMeWe8AQhBldzlfax865vLAlIpLJPhbU66g69pwv/6BHZkmmCrmCGJzF5lKkj438iVjrmCzDudRWMZdDqLhDcA4nLNIRPL52hqGN+XvtkAAgapZ6TnFj3ZL1VL99qWZoz14vl+X++hTBnUeahVha8yWgpyssgq5SW46vUK114DRDPLlPdkOzfqMJq1bJf3Xp2HlEeOQW13w0NNNakmExXNcO+yDq6atmpIy69mjNdpirhmQ40Kg/CHqWXGp2eDYGJ5/kil/jRf0gQzAGCyItv9sHE1oMu69ehaZVFBkn2TjqB9kgGE+nvemz7Ysv7O3xMkqZiG+npZ2UNASUW6rilY+yi3IMUKcI/eNN9QZs6FuHED73Vsewretg8pEMcyCSDHfNuCqQoOH5ir6+o1PapX0y4bgN7vMohrNDSzdNZdLIOAo1FYA0IOFq+a8tETkgzz6usAEtgDgNDxy17JDD2hTIaws2WQFKghh1HmTDt8WZ0O4vfKeDsBXvYXSoI5LMyqZBAtBMtPgDhZiBwgG7KuAp4KMgE01D9pbtVQ8IJBqsashSmkacsvA0oyx6odaflGp3TUZRW1veYHAvTDH/6wpbkb9lUQU5tYF1MouMaJRycfAQg7u/OM3b4UguoAV8WRA5JgHgqx7rZeB3l/NV1SHhIkMIh+SDJIKgfGNmfTddi5JqNqjnmCJBXTmBz2LIVW3l3ucpfFktueNrRhzkNkQ7PDhwCT39fP9X4FiIbLIPoMdBLCq8PO//gHTBKS4Mb11F8QJHX6HAVPv0I/BK0kQI7qJOFBCv/Ys6oMjf3Pb+RewSCeeus5Icm0yID5WDrqjBmvISWTYe1UnoJnWRsETPNBegxShVmt27Pp0q+wQ5axRgWU7KEJpEOe2tRkRekVzePpV0a3qiaQriknE+94HtoLsNDZsAcgsZypCNxRqUfPpxpSuGp67kG5Mfdhyon7synIXCtAGCc3sdbUNos5n1VlSQtkVTbZprhlkLThetpX38AZTgW8Z8rsZFBro/QPEv2uAMQ5R7BziWYy3AL9t25/z0DgxLvgRhAwMJhnsM9ZZ53VfJDdOJ07afdxuKdq8VXMK7W/Oyw6ow5AMmWIshgTTSyjjjrpdZfKVNAVGPqo64TQb8MgOWAKf4LA9BPNodTY2oQ906sySnai4OA+G6WPUCcGBQkdCwPIDPor1ZG0nmgabVnzuZhcJAMYwJx77rmz008/fQOQHSDWaF61CpQNi0yfTCUMg2QkS4AkgzDG5mMJECcKk0HSH1GWEiQVIMusnCY7ySCVRXpgodAESe2EZf07ZM75fU6UAQbDsTn7zbW5uZrgsANSo2mi8R1AcN9dOhZwEAWDkS644IIZJ9yu0mnL2nh7+73KQM/v6CkuvnMDOUwsLAIA4uZ/jgXvmY/lAirGM3PP0nKQeXJeLAGyii/SAKIPkn6EA1ztOv83DJkssqpQDDnztSE0JmfPM/QpAHTmTYfRf8lcKGfNnTsh54rOhoFw8Fmow+Qg7EFW7wYgq47k8HWrOOrKgecVmtULUGAUnWwFXebQScfEYtz53cBMBaGWiWDwfyNkq5jTjUHShBrS8BUsCmXv+gTYqgJXHShDvaalm3cFOLA7Kdc8Ld59TjbawAJl2Ym53oPBAShqp6nNO+xWVOus927L2+n9PUUrQNxhEWDIIgRe0sTicw8gTmBXhe7/CZBkIxX7KrK5mEm3sPQ7xjrEBqTDM2T/976v5pymkCygaaWz7sw6gu66ZQQf4eYa7rPuWZbhYurLvbAEJhXXaJrVdrr0tDr71m0VzbNTYdqL+1Qi2R9q5L0ofy/LMGHRKBZmFgCROXyWCYsySK4qrJZMOurK9U7rvM0HSSbpFVjNIx9upKlnPonSSrtZfiJdwJluIYP47g7olOfsuomNySKW6c7tBhA8KdWU+apFYBR34qtKQ8fPuu200/fzPiN22uaamL7v57N3UjbjyGy67EHSonv0UmflhjEWFG476xKInTx31Xv+H8OPrmKxkiCuAAAAAElFTkSuQmCC")
    }

    var validate = $('#form-send-testimonials')[0].reportValidity();
    if (validate) {
        $('#form-send-testimonials').submit();
    }
}


