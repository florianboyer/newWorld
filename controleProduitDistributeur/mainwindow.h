#ifndef MAINWINDOW_H
#define MAINWINDOW_H
#include "dialog.h"
#include <QMainWindow>

namespace Ui {
class MainWindow;
}

class MainWindow : public QMainWindow
{
    Q_OBJECT

public:
    explicit MainWindow(Dialog *monDialog ,QWidget *parent);
    QNetworkAccessManager myNWM;
    QNetworkCookieJar cookieJar;
    ~MainWindow();
    void affichageNomProdcuteur();

private:
    Ui::MainWindow *ui;
};

#endif // MAINWINDOW_H
