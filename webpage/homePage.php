<!DOCTYPE html>
<html>
    <head>
        <title>Mathematics Capstone 2018: Comparing Budgets</title>
        <?php
            include 'scripts.php';
            include 'style.php';
        ?>
    </head>
    
    <body>
        <?php
            include 'header.php';
        ?>
        <div class="jumbotron myJumbotron">
            <h1 id="jumbo">Comparing the Trend of Education Budget</h1> 
            <h1 id="jumbo">and Corrections Budget Between</h1>
            <h1 id="jumbo">2007 and 2017</h1>
        </div>
        <div class='container abstract'>
            <h2>Abstract</h2>
            <p>
                After the economic crisis of 2006, the budget of education and the budget of corrections
                both plummeted alongside other budgets. Our focus will be on the period following 2007, 
                where we will show how both budgets have recuperated respectively. The objective of this 
                study is to compare the trend of spending per student and trend of spending per inmate 
                between 2007 and 2017. We recognize that comparing inmates to students and the cost it takes
                to support each is like comparing apples and oranges. Meeting a student's needs for 
                access to education is much less costly than housing and providing for an inmate. To that
                end we compared the ratio, budget per inmate over budget per student, rather than the budgets
                themselves.  We used a linear model to address our research objective.      
            </p>
            <br>
            <a href="http://money.cnn.com/infographic/economy/education-vs-prison-costs/"><img src="../images/img_1.jpg" id="evsc" alt="EvsC"></a>
            <br>
            <p>
                The figure above illustrates each state's spending on education and corrections. 
                California is ranked 6th in spending for corrections and is ranked 29th in spending 
                for education. 
            </p>
            
        </div>  
        
        <!--<br><br>-->
        <!--<div class='container results'>-->
        <!--    <h2>Results</h2>-->
        <!--    <img src="../images/figure_1_capstone_2018.jpg" id="fig1" alt="fig1">-->
        <!--    <p>-->
        <!--        As shown in Figure 2, we are comparing trends between education vs. corrections -->
        <!--        on the left, and Observed Ratio vs. Estimated Linear Trend on the  right. -->
        <!--        To fit both budgets onto the same graph we have scaled down spending on corrections-->
        <!--        by a scale of 10. The economic crisis occurred in 2007. Comparing the year 2009 to 2007,-->
        <!--        the budget for education was cut by 10.04 dollars per student and the budget for corrections-->
        <!--        was cut by 39.45 dollars per inmate. This translates to a total budget cut of over -->
        <!--        64 million to education and a budget cut of nearly 7.5 million to corrections. By year 2013,-->
        <!--        the budget of corrections recovered at the level of 110 percent, but the education budget-->
        <!--        has not reached the level of 85 percent by year 2017. Using the statistical methods-->
        <!--        described in the previous section, we obtained the following statistics -->
        <!--        <span lang="latex">$\hat{\beta_1}=.42$</span>, <span lang="latex">$\hat{SE}=.1018$</span>,-->
        <!--        <span lang="latex">$T=4.109$</span>, P-value<span lang="latex">$=0.003$</span>, and -->
        <!--        <span lang="latex">$c=2.3060$</span>. We interpret <span lang="latex">$\hat{\beta_1}=.42$</span> as:-->
        <!--        We estimate that the ratio of correction budget to education has been increasing 0.42 per year on average.-->
        <!--        In other words, over the last decade, the ratio has been increasing by one every 2.5 years. -->
        <!--        We can calculate the confidence interval by substituting the obtained statistics into the formula to get-->
        <!--    </p>-->
        <!--    <div class='container equations'>-->
        <!--        <span lang="latex">-->
        <!--            \begin{equation}\notag-->
        <!--            (.42-2.3060\times.1018,.42+2.3060\times.1018)-->
        <!--            \end{equation}-->
        <!--        </span>-->
        <!--        <br>-->
        <!--        <span lang="latex">-->
        <!--            \begin{equation}\notag-->
        <!--            ( .1852 , .6548 )-->
        <!--            \end{equation}-->
        <!--        </span>-->
        <!--    </div>-->
        <!--    <p>-->
        <!--        Since the resulting p-value of 0.003 is less than the set significance level, 0.05 (p-value <span lang="latex">$< \alpha$</span>), -->
        <!--        we reject the null hypothesis that the average cost per student and average cost per inmate are not different. -->
        <!--        In other words, we have sufficient evidence to claim that the rate of growth for the correctional budget in California -->
        <!--        has been faster than the rate of growth for the budget of education in California since the economic crisis of 2006. -->

        <!--        Since <span lang="latex">$\hat{\beta_0} =  -832.45$</span> and <span lang="latex">$\hat{\beta_1}= .42$</span>, -->
        <!--        the estimated line is <span lang="latex">$\hat{Y} = -832.45 + .42 * X_p$</span>. Furthermore, we calculated -->
        <!--        prediction intervals for the following 5 years (2019-2023). As shown on Table 1:-->
        <!--    </p>-->
        <!--    <div class='container equations'>-->
                <!-- Table -->
        <!--    </div>-->
        <!--    <p>-->
        <!--        Based on the prediction interval Table 1, on the year 2020 the expected ratio, <span lang="latex">$\hat{Y}$</span>,-->
        <!--        would be 12.75. We expressed the degree of uncertainty for <span lang="latex">$\hat{Y}$</span> with the prediction -->
        <!--        interval of (9.75,15.75).-->
        <!--    </p>-->
              
        <!--</div> -->
            
    
        <br><br><br><br><br><br><br>
        <!--<h2>Contributors</h2>-->
        <!--<ul>-->
        <!--    <a href="collaborators/jr.php">Jessica Rosa</a>-->
        <!--    <a href="collaborators/br.php">Ben Rosales</a>-->
        <!--    <a href="collaborators/dq.php">Diego Quezada</a>-->
        <!--</ul>-->
        
        <!--<h2>Mentors</h2>-->
        <!--<ul>-->
        <!--    <a href="blank.php">Steven Kim</a>-->
        <!--    <a href="blank.php">Lipika Deka</a>-->
        <!--</ul>-->
        
        <?php
            include 'footer.php';
        ?>
    </body>
</html>