function subCounty (areas) {
    return function(e) {
        subcountyEl = document.getElementById("subcounty");
        while (subcountyEl.options.length > 0) {
            subcountyEl.remove(0);
        }

        let county = e.target.value
        const subCounties = areas[county].subcounties

        Object.keys(subCounties).forEach(
            key => {
                let opt = new Option(subCounties[key], key);
                subcountyEl.appendChild(opt)
            })
    }
}