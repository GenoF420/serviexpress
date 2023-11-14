package server

import (
	"github.com/GenoF420/serviexpress/internal/auth"
	"github.com/GenoF420/serviexpress/internal/config"
	"github.com/GenoF420/serviexpress/internal/database"
	"github.com/charmbracelet/log"
	"github.com/kataras/iris/v12"
	"net"
	"strconv"
)

type Server struct {
	Application   *iris.Application
	Configuration *config.Config
	Handlers      *Handlers
}

type Handlers struct {
	authHandler auth.Handler
}

func New(cfgOpts ...config.Option) (*Server, error) {
	cfg := config.Build(cfgOpts...)

	app := iris.Default()

	if cfg.HTTP.Debug {
		log.SetLevel(log.DebugLevel)
		app.Logger().SetLevel("debug")
	} else {
		log.SetLevel(log.InfoLevel)
		app.Logger().SetLevel("info")
	}

	db := database.Create(*cfg)

	server := &Server{
		Application:   app,
		Configuration: cfg,
		Handlers: &Handlers{
			authHandler: auth.Handler{Service: auth.New(db)},
		},
	}

	return server, nil
}

func (s *Server) Run() error {
	var addr string

	addr = net.JoinHostPort(s.Configuration.HTTP.Address, strconv.Itoa(s.Configuration.HTTP.Port))

	return s.Application.Run(iris.Addr(addr))
}
