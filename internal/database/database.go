package database

import (
	"fmt"
	"github.com/GenoF420/serviexpress/internal/config"
	"github.com/charmbracelet/log"
	"github.com/jmoiron/sqlx"
	_ "github.com/lib/pq"
)

func Create(cfg config.Config) *sqlx.DB {
	db, err := sqlx.Connect("postgres", fmt.Sprintf(
		"user=%s dbname=%s sslmode=%s password=%s host=%s port=%v",
		cfg.Database.Username,
		cfg.Database.Database,
		cfg.Database.SSLMode,
		cfg.Database.Password,
		cfg.Database.Host,
		cfg.Database.Port,
	))
	if err != nil {
		log.Fatal("Failed to connect to database", "err", err)
	}

	defer db.Close()

	if err = db.Ping(); err != nil {
		log.Fatal("Failed to ping database", "err", err)
	}

	log.Info("Successfully connected to Postgres!")
	return db
}
