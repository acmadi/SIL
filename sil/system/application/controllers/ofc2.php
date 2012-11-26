<?php

/**
 * OFC2 Chart Controller
 * 
 * @package CodeIgniter
 * @author  thomas (at) kbox . ch
 */
class Ofc2 extends Controller {
  
    /**
     * Constructor
     * 
     * @return void
     */
	function __construct()
	{
        parent::__construct();
        $this->load->helper('url_helper');
	}

    /**
     * Default controller function
     * 
     * @return void
     */
	public function index()
	{
        $this->show_chart('pie');
	}

    /**
     * Loads the chart view with the given chart type
     * 
     * @param string $chart_type
     * @return void 
     */
    public function show_chart($chart_type)
    {
        // available chart types
        $chart_types = array('line', 'bar', 'pie', 'area', 'scatter');

        // build links for display
        $links = array();
        foreach ($chart_types as $type)
        {
            $links[$type] = site_url('ofc2/show_chart/' . $type);
        }

        // clean chart type and build view variables
        $chart_type = strtolower(trim($chart_type));
        if (in_array($chart_type, $chart_types))
        {
            $data = array(
                            'chart_height'  => 400,
                            'chart_width'   => '80%',
                            'data_url'      => site_url('ofc2/get_data_'
                                                         . $chart_type),
                            'page_title'    => ucwords('OFC2 Plugin - '
                                                        . $chart_type
                                                        . ' chart'),
                            'links'         => $links
                         );
        
            $this->load->view('ofc2_chart_view', $data);
        }
        else
        {
            show_error('Bad chart type, try: ' . implode(', ', $chart_types));
        }
    }

    /**
     * Generates data for OFC2 bar chart in json format
     *
     * @return void
     */
    public function get_data_bar()
    {

        $this->load->plugin('ofc2');
		$title = new title( 'Data Penggunaan Lahan Kota Depok Tahun 2006-2007' );

		//retrieve data
		
		$d = Doctrine_Query::create()
						->select('*')
						->from('use_lahan')
						->where('data_tahun = ?', 98);
						
		$r = $d->execute()->toArray();
		
		// $bar_2006 = array(
			// new pie_value(floatval($r[0]['pemukiman']),'Pemukiman'),
			// new pie_value(floatval($r[0]['jasa']),'Jasa'),
			// new pie_value(floatval($r[0]['industri']),'Industri'),
			// new pie_value(floatval($r[0]['tegalan']),'Tegalan'),
			// new pie_value(floatval($r[0]['sawah_irigasi_teknis']),'Sawah Irigasi Teknis'),
			// new pie_value(floatval($r[0]['sawah_tadah_hujan']),'Sawah Tadah Hujan'),
			// new pie_value(floatval($r[0]['kebun_campuran']),'Kebun Campuran'),
			// new pie_value(floatval($r[0]['perkebunan']),'Perkebunan'),
			// new pie_value(floatval($r[0]['hutan']),'Hutan'),
			// new pie_value(floatval($r[0]['perairan']),'Perairan'),
			// new pie_value(floatval($r[0]['tambak']),'Tambak'),
			// new pie_value(floatval($r[0]['tanah_kosong']),'Tanah Kosong'),
			// new pie_value(floatval($r[0]['semak_alang']),'Semak alang-alang'),
			// new pie_value(floatval($r[0]['lain_lain']),'Lain-Lain')
		// );
		// $bar_2007 = array(
			// new pie_value(floatval($r[0]['pemukiman'])+rand(0,100),'Pemukiman'),
			// new pie_value(floatval($r[0]['jasa'])+rand(0,100),'Jasa'),
			// new pie_value(floatval($r[0]['industri'])+rand(0,100),'Industri'),
			// new pie_value(floatval($r[0]['tegalan'])+rand(0,100),'Tegalan'),
			// new pie_value(floatval($r[0]['sawah_irigasi_teknis'])+rand(0,100),'Sawah Irigasi Teknis'),
			// new pie_value(floatval($r[0]['sawah_tadah_hujan'])+rand(0,100),'Sawah Tadah Hujan'),
			// new pie_value(floatval($r[0]['kebun_campuran'])+rand(0,100),'Kebun Campuran'),
			// new pie_value(floatval($r[0]['perkebunan'])+rand(0,100),'Perkebunan'),
			// new pie_value(floatval($r[0]['hutan'])+rand(0,100),'Hutan'),
			// new pie_value(floatval($r[0]['perairan'])+rand(0,100),'Perairan'),
			// new pie_value(floatval($r[0]['tambak'])+rand(0,100),'Tambak'),
			// new pie_value(floatval($r[0]['tanah_kosong'])+rand(0,100),'Tanah Kosong'),
			// new pie_value(floatval($r[0]['semak_alang'])+rand(0,100),'Semak alang-alang'),
			// new pie_value(floatval($r[0]['lain_lain'])+rand(0,100),'Lain-Lain')
		// );
		
		
		
		
		// $bar_value_2006 = array(
			// (floatval($r[0]['pemukiman']),'Pemukiman'),
			// (floatval($r[0]['jasa']),'Jasa'),
			// new pie_value(floatval($r[0]['industri']),'Industri'),
			// new pie_value(floatval($r[0]['tegalan']),'Tegalan'),
			// new pie_value(floatval($r[0]['sawah_irigasi_teknis']),'Sawah Irigasi Teknis'),
			// new pie_value(floatval($r[0]['sawah_tadah_hujan']),'Sawah Tadah Hujan'),
			// new pie_value(floatval($r[0]['kebun_campuran']),'Kebun Campuran'),
			// new pie_value(floatval($r[0]['perkebunan']),'Perkebunan'),
			// new pie_value(floatval($r[0]['hutan']),'Hutan'),
			// new pie_value(floatval($r[0]['perairan']),'Perairan'),
			// new pie_value(floatval($r[0]['tambak']),'Tambak'),
			// new pie_value(floatval($r[0]['tanah_kosong']),'Tanah Kosong'),
			// new pie_value(floatval($r[0]['semak_alang']),'Semak alang-alang'),
			// new pie_value(floatval($r[0]['lain_lain']),'Lain-Lain')
		// );
		// $bar_value_2007 = array(
			// new pie_value(floatval($r[0]['pemukiman'])+rand(0,100),'Pemukiman'),
			// new pie_value(floatval($r[0]['jasa'])+rand(0,100),'Jasa'),
			// new pie_value(floatval($r[0]['industri'])+rand(0,100),'Industri'),
			// new pie_value(floatval($r[0]['tegalan'])+rand(0,100),'Tegalan'),
			// new pie_value(floatval($r[0]['sawah_irigasi_teknis'])+rand(0,100),'Sawah Irigasi Teknis'),
			// new pie_value(floatval($r[0]['sawah_tadah_hujan'])+rand(0,100),'Sawah Tadah Hujan'),
			// new pie_value(floatval($r[0]['kebun_campuran'])+rand(0,100),'Kebun Campuran'),
			// new pie_value(floatval($r[0]['perkebunan'])+rand(0,100),'Perkebunan'),
			// new pie_value(floatval($r[0]['hutan'])+rand(0,100),'Hutan'),
			// new pie_value(floatval($r[0]['perairan'])+rand(0,100),'Perairan'),
			// new pie_value(floatval($r[0]['tambak'])+rand(0,100),'Tambak'),
			// new pie_value(floatval($r[0]['tanah_kosong'])+rand(0,100),'Tanah Kosong'),
			// new pie_value(floatval($r[0]['semak_alang'])+rand(0,100),'Semak alang-alang'),
			// new pie_value(floatval($r[0]['lain_lain'])+rand(0,100),'Lain-Lain')
		// );
		
		
        // $bar_2006 = new bar();
        // // $bar->set_values( array(1,2,3,4,5,6,7,8,9) );
        // $bar_2006->set_values( $bar_value_2006 );

        // $chart = new open_flash_chart();
        // $chart->set_title( $title );
        // $chart->add_element( $bar_2006 );
        // $chart->add_element( $bar_2006 );

        echo $chart->toPrettyString();
    }

    /**
     * Generates data for OFC2 line chart in json format
     *
     * @return void
     */
    public function get_data_line()
    {
        $this->load->plugin('ofc2');

        $data_1 = array();
        $data_2 = array();
        $data_3 = array();

        for( $i=0; $i<6.2; $i+=0.2 )
        {
        $data_1[] = (sin($i) * 1.9) + 7;
        $data_2[] = (sin($i) * 1.9) + 10;
        $data_3[] = (sin($i) * 1.9) + 4;
        }

        $title = new title( date("D M d Y") );

        $d = new hollow_dot();
        $d->size(5)->halo_size(0)->colour('#3D5C56');

        $line_1 = new line();
        $line_1->set_default_dot_style($d);
        $line_1->set_values( $data_1 );
        $line_1->set_width( 2 );
        $line_1->set_colour( '#3D5C56' );

        $d = new hollow_dot();
        $d->size(4)->halo_size(1)->colour('#668053');

        $line_2 = new line();
        $line_2->set_values( $data_2 );
        $line_2->set_default_dot_style($d);
        $line_2->set_width( 1 );
        $line_2->set_colour( '#668053' );

        $d = new hollow_dot();
        $d->size(4)->halo_size(1)->colour('#C25030');

        $line_3 = new line();
        $line_3->set_values( $data_3 );
        $line_3->set_default_dot_style($d);
        $line_3->set_width( 6 );
        $line_3->set_colour( '#C25030' );

        $y = new y_axis();
        $y->set_range( 0, 15, 5 );


        $chart = new open_flash_chart();
        $chart->set_title( $title );
        $chart->add_element( $line_1 );
        $chart->add_element( $line_2 );
        $chart->add_element( $line_3 );
        $chart->set_y_axis( $y );

        echo $chart->toPrettyString();
    }

    /**
     * Generates data for OFC2 pie chart in json format
     *
     * @return void
     */
    public function get_data_pie()
    {
        $this->load->plugin('ofc2');

        $title = new title( 'Data Penggunaan Lahan Kota Depok' );

		//retrieve data
		
		$d = Doctrine_Query::create()
						->select('*')
						->from('use_lahan')
						->where('data_tahun = ?', 98);
						
		$r = $d->execute()->toArray();
		
		$pie_valueobj = array(
			new pie_value(floatval($r[0]['pemukiman']),'Pemukiman'),
			new pie_value(floatval($r[0]['jasa']),'Jasa'),
			new pie_value(floatval($r[0]['industri']),'Industri'),
			new pie_value(floatval($r[0]['tegalan']),'Tegalan'),
			new pie_value(floatval($r[0]['sawah_irigasi_teknis']),'Sawah Irigasi Teknis'),
			new pie_value(floatval($r[0]['sawah_tadah_hujan']),'Sawah Tadah Hujan'),
			new pie_value(floatval($r[0]['kebun_campuran']),'Kebun Campuran'),
			new pie_value(floatval($r[0]['perkebunan']),'Perkebunan'),
			new pie_value(floatval($r[0]['hutan']),'Hutan'),
			new pie_value(floatval($r[0]['perairan']),'Perairan'),
			new pie_value(floatval($r[0]['tambak']),'Tambak'),
			new pie_value(floatval($r[0]['tanah_kosong']),'Tanah Kosong'),
			new pie_value(floatval($r[0]['semak_alang']),'Semak alang-alang'),
			new pie_value(floatval($r[0]['lain_lain']),'Lain-Lain')
		);
		
		$pie = new pie();
		$pie->set_start_angle( 0 );
		$pie->alpha(0.7);
		$pie->set_animate(true );
		$pie->add_animation( new pie_bounce(9) );
		$pie->set_tooltip( '#label#<br>#val# of #total#<br>#percent# of 100%' );
		$pie->set_values( $pie_valueobj);
		$pie->set_colours( array('#ff0000','#00ff00','#0000ff','#ffff00','#ff00ff','#00ffff','#123456'));
		$chart = new open_flash_chart();
		$chart->set_title( $title );
		$chart->add_element( $pie );
		$chart->set_bg_colour('#eeeeee');
		$chart->x_axis = null;

		
        echo $chart->toPrettyString();
    }

    /**
     * Generates data for OFC2 area chart in json format
     *
     * @return void
     */
    public function get_data_area()
    {
        $this->load->plugin('ofc2');
        
        $data = array();

        for( $i=0; $i<6.2; $i+=0.2 )
        {
            $tmp = sin($i) * 1.9;
            $data[] = $tmp;
        }

        $chart = new open_flash_chart();
        $chart->set_title( new title( 'Area Chart' ) );

        //
        // Make our area chart:
        //
        $area = new area();
        // set the circle line width:
        $area->set_width( 2 );
        $area->set_default_dot_style( new hollow_dot() );
        $area->set_colour( '#838A96' );
        $area->set_fill_colour( '#E01B49' );
        $area->set_fill_alpha( 0.4 );
        $area->set_values( $data );

        // add the area object to the chart:
        $chart->add_element( $area );

        $y_axis = new y_axis();
        $y_axis->set_range( -2, 2, 2 );
        $y_axis->labels = null;
        $y_axis->set_offset( false );

        $x_axis = new x_axis();
        $x_axis->labels = $data;
        $x_axis->set_steps( 2 );

        $x_labels = new x_axis_labels();
        $x_labels->set_steps( 4 );
        $x_labels->set_vertical();
        // Add the X Axis Labels to the X Axis
        $x_axis->set_labels( $x_labels );

        $chart->add_y_axis( $y_axis );
        $chart->x_axis = $x_axis;

        echo $chart->toPrettyString();
    }

    /**
     * Generates data for OFC2 scatter chart in json format
     *
     * @return void
     */
    public function get_data_scatter()
    {
        $this->load->plugin('ofc2');
        
        $chart = new open_flash_chart();

        $title = new title( date("D M d Y") );
        $chart->set_title( $title );

        $s = new scatter_line( '#DB1750', 3 );
        $def = new hollow_dot();
        $def->size(3)->halo_size(2);
        $s->set_default_dot_style( $def );
        $v = array();

        $x = 0.0;
        $y = 0;
        do
        {
            $v[] = new scatter_value( $x, $y );

            // move up or down in Y axis:
            $y += rand(-20, 20)/10;
            if( $y > 10 )
                $y = 10;

            if( $y < -10 )
                $y = -10;

            $x += rand(5, 15)/10;
        }
        while( $x < 25 );

        $s->set_values( $v );
        $chart->add_element( $s );

        $x = new x_axis();
        $x->set_range( 0, 25 );
        $chart->set_x_axis( $x );

        $y = new x_axis();
        $y->set_range( -10, 10 );
        $chart->add_y_axis( $y );


        echo $chart->toPrettyString();
    }
}
