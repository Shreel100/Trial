<?php /* Main Site Search Tabs*/ ?>

<div class="rylib-tabs">

  <?php 
  /** 
   * Top Level Tab Control
   *
   * The 'data-target' attribute references the <li> in the content section
   * that it controls. 
   *
   */ 
  ?>
  <ul class="tabs">
    <li><a href="#" class="active" data-target="#everything">Search Everything</a></li>
    <li><a href="#" data-target="#catalogue">Books</a></li>
    <li><a href="#" data-target="#journals-newspapers">Journals &amp; Newspapers</a></li>
    <li><a href="#" data-target="#databases">Databases</a></li>
    <li><a href="#" data-target="#media">Media</a></li>
  </ul>

  <?php 
  /** 
   * Main Content Level
   * 
   * Each <li> represents a different tabbed content area. It needs an ID that
   * references one of the keys in Tab Control section.
   *
   * e.g.: <li id="everything"> references the tab control with the 
   * attribute  data-target="#everything"
   */ 
  ?>

  <ul class="tabs-content">
    <li id="everything" class="active">
      <!-- Search Everything Form -->
      <form class="form-track-submits" name="search" method="GET" action="https://torontomu.summon.serialssolutions.com/search" data-ga-event-category="Search / Resource Discovery" data-ga-event-action="Summon search" data-ga-event-label="Everything">
        <div class="rylib-search-bar">
          <input type="search" name="s.q" autocomplete="off" title="Search for journal articles, books, newspapers and more!" placeholder="Search for journal articles, books, newspapers and more!" x-webkit-speech speech/>
          <button type="submit">Go</button>
        </div>

        <hr>
        
        <div style="display: flex; justify-content: space-between; font-size: 12px;">
          <span style="display: flex; align-items: center;">
            <input style="margin: 0;" id="scholarlyopt" name="s.fvf" type="checkbox" value="IsScholarly,true">
            <label style="margin: 0; font-weight: 400;" for="scholarlyopt">&nbsp;scholarly (including peer reviewed) only</label>
          </span>
          <a href="https://torontomu.summon.serialssolutions.com/advanced" ga-on="click" ga-event-category="Search / Resource Discovery" ga-event-action="Summon search" ga-event-label="Advanced">Advanced Search</a>
        </div>

        <input type="hidden" name="s.fvf" value="ContentType,Book Review,t">
        <input type="hidden" name="spellcheck" value="true">
      </form>
      <!-- END: Search Everything Form -->
    </li>

    <?php /* Catalogue Tab Content */ ?>
    <li id="catalogue">

      <!-- Nested Tabs! -->
      <div class="rylib-tabs">
        <ul class="tabs">
          <li><a href="#" class="active" data-target="#keywords">Keywords</a></li>
          <li><a href="#" data-target="#title">Title</a></li>
          <li><a href="#" data-target="#author">Author</a></li>
          <li><a href="#" data-target="#course-readings">Course Readings</a></li>
          <li><a href="#" data-target="#call-number">Call #</a></li>
          <li><a href="#" data-target="#lc-subject">LC Subject</a></li>
        </ul>
        <ul class="tabs-content">
          <li id="keywords" class="active">
            <!-- Summon: Keyword search -->
            <p><strong>Search by Keyword</strong></p>
            <p>Find books, journals, DVDs, CDs, ebooks, theses, maps, Government Documents...</p>
            <hr>
            <div class="rylib-search-form">
              <form class="form-track-submits summon_search" method="GET" action="https://torontomu.summon.serialssolutions.com/search" data-ga-event-category="Search / Resource Discovery" data-ga-event-action="Summon search" data-ga-event-label="Books (Keywords)">
                <input type="hidden" name="fvf" value="ContentType,Book / eBook">
                <button type="submit">Go</button>
                <input type="search" name="input" autocomplete="off" placeholder="Enter the book title..." x-webkit-speech speech>
                <input type="hidden" name="q" autocomplete="off" value="">
                <input type="hidden" name="spellcheck" value="true">
              </form>
            </div>
            <span style="float:right;font-size:12px;padding:5px 0 0 0;">
              <a href="https://catalogue.library.ryerson.ca/screens/mainmenu.html">Advanced Search</a>
            </span>
            <div style="clear:both;"></div>
          </li>
          <li id="title">
            <!-- Summon: Title search -->
            <p><strong>Search by Title</strong></p>
            <p>e.g.: Boom Bust and Echo, Map that Changed the World</p>
            <hr>
            <div class="rylib-search-form">
              <form class="form-track-submits summon_search" method="GET" action="https://torontomu.summon.serialssolutions.com/search" data-ga-event-category="Search / Resource Discovery" data-ga-event-action="Summon search" data-ga-event-label="Books (Title)" data-summon-facet="title">
                <input type="hidden" name="fvf" value="ContentType,Book / eBook">
                <button type="submit">Go</button>
                <input type="search" name="input" autocomplete="off" placeholder="Enter the book title..." x-webkit-speech speech>
                <input type="hidden" name="q" autocomplete="off" value="">
                <input type="hidden" name="spellcheck" value="true">
              </form>
            </div>
            <div style="clear:both;"></div>
          </li>
          <li id="author">
            <!-- Summon: Author search -->
            <p><strong>Search by Author</strong></p>
            <p>e.g.: "Smith, John", Canadian Medical Association, Tragically Hip</p>
            <hr>
            <div class="rylib-search-form">
              <form class="form-track-submits summon_search" method="GET" action="https://torontomu.summon.serialssolutions.com/search" data-ga-event-category="Search / Resource Discovery" data-ga-event-action="Summon search" data-ga-event-label="Books (Author)" data-summon-facet="author">
                <input type="hidden" name="fvf" value="ContentType,Book / eBook">
                <button type="submit">Go</button>
                <input type="search" name="input" autocomplete="off" placeholder="Enter the author's name..." x-webkit-speech speech>
                <input type="hidden" name="q" autocomplete="off" value="">
                <input type="hidden" name="spellcheck" value="true">
              </form>
            </div>
            <div style="clear:both;"></div>
          </li>
          <li id="course-readings">
            <!-- Sierra: Course Readings search -->
            <p><strong>Search by Course Code</strong></p>
            <p style="padding-bottom:5px;">e.g.: ece210</p>
            <div class="rylib-search-form">
              <form method="get" class="form-track-submits" action="https://catalogue.library.ryerson.ca/search/r" data-ga-event-category="Search / Resource Discovery" data-ga-event-action="Sierra search" data-ga-event-label="Course Code">
                <button type="submit">Go</button>
                <input name="SEARCH" type="search" title="Enter your course code" placeholder="Enter your course code..." x-webkit-speech speech/>
              </form>
            </div>
            <div style="padding:5px 0;clear:both">
              <hr>
            </div>

            <p><strong>Search by Instructor</strong></p>
            <p style="padding-bottom:5px;">e.g.: Gao, Yunxiang</p>
            <div class="rylib-search-form">
              <form method="get" class="form-track-submits" action="https://catalogue.library.ryerson.ca/search/p" data-ga-event-category="Search / Resource Discovery" data-ga-event-action="Sierra search" data-ga-event-label="Instructor">
                <button type="submit">Go</button>
                <input name="SEARCH" type="search" title="Enter your Instructor's name" placeholder="Enter your Instructor..." x-webkit-speech speech/>
              </form>
            </div>
            <div style="clear:both;"></div>
          </li>
          <li id="call-number">
            <!-- Sierra: Call Number search -->
            <p><strong>Search by Call Number</strong></p>
            <p>e.g.: QA403.P74 2004, HD31</p>
            <hr>
            <div class="rylib-search-form">
              <form method="get" class="form-track-submits" action="https://catalogue.library.ryerson.ca/search/c" data-ga-event-category="Search / Resource Discovery" data-ga-event-action="Sierra search" data-ga-event-label="Call Number">
                <button type="submit">Go</button>
                <input name="SEARCH" type="search" title="Enter a call number" placeholder="Enter a call number..." x-webkit-speech speech/>
              </form>
            </div>
            <div style="clear:both;"></div>
          </li>
          <li id="lc-subject">
            <!-- Sierra: LC Subject search -->
            <p><strong>Search by Library of Congress Subject</strong></p>
            <p>e.g.: caribbean area history, eating disorders, women employment canada</p>
            <hr>
            <div class="rylib-search-form">
              <form method="get" class="form-track-submits" action="https://catalogue.library.ryerson.ca/search/d" data-ga-event-category="Search / Resource Discovery" data-ga-event-action="Sierra search" data-ga-event-label="LC Subject">
                <button type="submit">Go</button>
                <input name="SEARCH" type="search" title="Enter a subject" placeholder="Enter a subject..." x-webkit-speech speech/>
              </form>
            </div>
            <div style="clear:both;"></div>
          </li>
        </ul>
      </div>

    </li>

    <?php /* Journals & Newspapers Tab Content */ ?>
    <li id="journals-newspapers">
      <div class="SS_TitleSearchForm">
        <form style="display:flex;position:relative;" method="get" class="form-track-submits" action="https://eq6sp2kj9f.search.serialssolutions.com/" name="SS_EJPSearchForm">
          <input type="hidden" name="tab" value="JOURNALS" />
          <input value="1.0" name="V" type="hidden" />
          <input value="100" name="N" type="hidden" />
          <input type="hidden" name="L" value="eq6sp2kj9f" />
          <select style="margin-right: 1rem; background-color: #e5e5e5; padding-left: 0.5rem; border-radius: 5px" name="S">
            <option value="A_T_B" selected="selected">Title begins with</option>
            <option value="A_T_M">Title equals</option>
            <option value="T_W_A">Title contains all words</option>
            <option value="I_M">ISSN equals</option>
          </select>
          <input style="border-radius: 5px;width:100%;" name="C" type="search" title="Search by entering a Journal Title" placeholder="Enter a Journal Title..." value="" x-webkit-speech speech/>
          <input style="position: absolute; top: 1px; right: 1px; border-radius: 0 5px 5px 0; border: none; background: #e5e5e5; color: var(--ryerson-blue);" value="Go" type="Submit" />
        </form>
      </div>
      <div style="clear:both;padding-top:1px;padding-bottom:15px;"></div>
      <div style="clear:both;"></div>
    </li>
    
    <?php /* Databases Tab Content */ ?>
    <li id="databases">
      <form class="form-track-submits select_form" data-ga-event-category="Search / Resource Discovery" data-ga-event-action="Subject Databases">
        <!-- requires the LibGuides Cache plugin to be activated and configured  -->
        <?php echo do_shortcode('[databases_by_subject_dropdown style="border-radius: 5px;"]'); ?>
        <button style="border-radius: 0 5px 5px 0; background: #e5e5e5; border: none; top: 1px; right: 1px;" type="submit">Go</button>
        <div style="clear:both;font-size:12px;padding-top:5px;">or <a href="http://learn.library.torontomu.ca/az.php" ga-on="click" ga-event-category="Search / Resource Discovery" ga-event-action="Subject Databases" ga-event-label="Browse A-Z List">Browse A-Z Databases List</a></div>
        <div style="clear:both;"></div>
      </form>
    </li>
    
    <?php /* Media Tab Content */ ?>
    <li id="media">
      <div class="rylib-search-form">
        <form class="form-track-submits" name="search" method="GET" action="https://torontomu.summon.serialssolutions.com/search" data-ga-event-category="Search / Resource Discovery" data-ga-event-action="Summon search" data-ga-event-label="Media">
          <button type="submit">Go</button>
          <input type="hidden" name="fvf" value="ContentType,Video Recording"><input type="hidden" name="fvf" value="ContentType,Film"><input type="hidden" name="fvf" value="ContentType,Streaming Video"><input type="hidden" name="fvf" value="ContentType,Audio Recording"><input type="search" name="q" autocomplete="off" title="Search for videos, DVDs,audio!" placeholder="Search for Videos, DVD, Audio!" x-webkit-speech speech/>
          <input type="hidden" name="spellcheck" value="true">
        </form>
      </div>
      <div style="clear:both; padding-top:1px; padding-bottom:15px;"></div>
    </li>

  </ul>
</div>