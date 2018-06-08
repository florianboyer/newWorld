#ifndef DIALOG_H
#define DIALOG_H

#include <QDialog>
#include <QNetworkAccessManager>
#include <QNetworkCookieJar>

namespace Ui {
    class Dialog;
}

class Dialog : public QDialog
{
    Q_OBJECT

public:
    explicit Dialog(QWidget *parent = 0);
    ~Dialog();
    QString identifiant,nom,prenom;
    QNetworkAccessManager myNWM;
    QNetworkCookieJar cookieJar;
    QString login;

private slots:
    void on_pushButtonOk_clicked();

    void on_pushButtonAnnuler_clicked();

private:
    Ui::Dialog *ui;
};

#endif // DIALOG_H
