<template>
    <div class="row">
        <div class=" col-sm-12">
            <div class="jumbotron text-center">
                <h1>Assessment l Temper VUE APP</h1>
            </div>
            <p>We want to see a Retention curve chart that shows how far a group of users (weekly cohorts) has progressed through the Onboarding Flow.</p>
            <ul>
                <li>Get an insight into how users flow through the onboarding process</li>
                <li>Get insight into how the onboarding process improves over time</li>
                <li>Get information on where we should improve the onboarding; where do users get stuck?</li>
            </ul>
            <highcharts class="chart" :options="chartOptions" :updateArgs="updateArgs"></highcharts>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                title: 'Assessment l Temper',
                points: [10, 0, 8, 2, 6, 4, 5, 5],
                colorInputIsSupported: null,
                animationDuration: 1000,
                updateArgs: [true, true, {duration: 1000}],
                chartOptions: {
                    xAxis: {
                        categories: [
                            'Create account: 0',
                            'Activate account: 20',
                            'Profile information 40',
                            'Jobs interests: 50',
                            'Relevant Experience: 70',
                            'Freelancer: 90',
                            'Waiting for approval: 99',
                            'Approval :100'
                        ],
                        title: {
                            text: "Steps (%)"
                        },
                        labels: {
                            format: "{value}%"
                        },
                    },
                    yAxis: {
                        title: {
                            text: "Users (%)"
                        },
                        labels: {
                            format: "{value}%"
                        },
                        min: 0,
                        max: 100
                    },
                    credits:{
                        enabled:false
                    },
                    chart: {
                        type: 'spline'
                    },
                    title: {
                        text: 'Weekly Retention'
                    },
                    series: []
                }
            }
        },
        mounted: function () {
            const baseUrl = "http://localhost:8000";
            this.$http.get(baseUrl + '/api/get_retention_chart_data')
                .then(response => {
                    const arrayLength = response.data.length;
                    for (let i = 0; i < arrayLength; i++) {
                        this.chartOptions.series.push(
                            response.data[i]
                        );
                    }
                });
        },
    }
</script>
