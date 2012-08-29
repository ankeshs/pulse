import java.io.*;
import java.awt.*;
import java.awt.event.*;
import javax.swing.*;

class vector extends JFrame
{
	vector(int c)
	{
		setSize(800,600);
		setLayout(new BorderLayout());
		add(new Diw(c), BorderLayout.CENTER);
	}

	public static void main(String args[]) throws Exception
	{
		int c=5;
		if(args!=null && args.length>0)
			c=Integer.parseInt(args[0]);
		(new vector(c)).setVisible(true);
	}
}

class Diw extends JPanel
{
	int a[][];
	int r;
	int h;
	int c;
	Diw(int c)
	{
		this.c=c;
		a=new int[800/c][600/c];	
		r=20*10;
		h=250;		
		f1();
		f2();
	}

	int adX(int x){return x*c-400+3; }
	int adY(int y){return 300-y*c+3; }

	void f1()
	{
		for(int i=0;i<800/c;i++)
			for(int j=0;j<600/c;j++)
			{
				if(adY(j)<0 && adX(i)*adX(i)+adY(j)*adY(j)<r*r){
					a[i][j]=1;
					//System.out.print(i+","+j+" - ");
				}
				if(adY(j)<0 && (adX(i)-0.5*r)*(adX(i)-0.5*r)+(adY(j)-2.5*r)*(adY(j)-2.5*r)<6.5*r*r)
				{
					a[i][j]=0;
				       //System.out.print(i+","+j+" - ");
				}
				if(adY(j)<0 && (adX(i)+0.5*r)*(adX(i)+0.5*r)+(adY(j)-2.5*r)*(adY(j)-2.5*r)<6.5*r*r)
				{
					a[i][j]=0;
				       //System.out.print(i+","+j+" - ");
				}
			}

	}

	void f2()
	{
		for(int i=0;i<800/c;i++)
			for(int j=0;j<600/c;j++)
			{
				if(adY(j)>0 && (adX(i)-1.1*h)*(adX(i)-1.1*h)+(adY(j)-0.5*h)*(adY(j)-0.5*h)<1.43*h*h && (adX(i)+1.1*h)*(adX(i)+1.1*h)+(adY(j)-0.5*h)*(adY(j)-0.5*h)<1.43*h*h)
				{
					a[i][j]=2;
				       //System.out.print(i+","+j+" - ");
				}
				
			}
	}

	public void paintComponent(Graphics gr)
	{
		super.paintComponent(gr);
    	        Graphics2D g = (Graphics2D)gr;   
                g.setRenderingHint(RenderingHints.KEY_ANTIALIASING, RenderingHints.VALUE_ANTIALIAS_ON);
                g.scale(1.0,1.0);
		g.setColor(Color.BLACK);
		g.fillRect(0,0,800,600);
		for(int i=0;i<800/c;i++)
			for(int j=0;j<600/c;j++)
			{
				switch(a[i][j])
				{
					case 0: break;
					case 1: g.setColor(Color.RED);
						g.fillRect(i*c,j*c,c,c);
						break;
					case 2: g.setColor(Color.YELLOW);
						g.fillRect(i*c,j*c,c,c);
						break;
				}
			}
		//g.fillRect(400,300,450,350);
		g.setColor(Color.GRAY);
		for (int i=0;i<=800/c;i++)
			g.drawLine(i*c,0,i*c,600);
		for (int i=0;i<=600/c;i++)
			g.drawLine(0,i*c,800,i*c);
		
	}
}
